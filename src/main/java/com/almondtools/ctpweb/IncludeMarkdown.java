package com.almondtools.ctpweb;

import static com.almondtools.comtemplate.engine.TemplateParameter.param;
import static com.almondtools.comtemplate.engine.TemplateVariable.var;
import static com.almondtools.comtemplate.engine.expressions.StringLiteral.string;

import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.List;

import com.almondtools.comtemplate.engine.ArgumentRequiredException;
import com.almondtools.comtemplate.engine.ContextRequiredException;
import com.almondtools.comtemplate.engine.Scope;
import com.almondtools.comtemplate.engine.TemplateDefinition;
import com.almondtools.comtemplate.engine.TemplateImmediateExpression;
import com.almondtools.comtemplate.engine.TemplateInterpreter;
import com.almondtools.comtemplate.engine.TemplateVariable;
import com.almondtools.comtemplate.engine.expressions.IOResolutionError;
import com.almondtools.comtemplate.engine.expressions.RawText;
import com.almondtools.comtemplate.processor.TemplateProcessor;
import com.vladsch.flexmark.ast.Document;
import com.vladsch.flexmark.html.HtmlRenderer;
import com.vladsch.flexmark.parser.Parser;
import com.vladsch.flexmark.profiles.pegdown.Extensions;
import com.vladsch.flexmark.profiles.pegdown.PegdownOptionsAdapter;
import com.vladsch.flexmark.util.options.DataHolder;

public class IncludeMarkdown extends TemplateDefinition {

	public static final String NAME = "includeMarkdown";
	public static final String SOURCE = "source";
	public static final String CHARSET = "charset";
	public static final String LINKBASE = "linkbase";

	private static final String DEFAULT_CHARSET = "utf-8";

	private Parser parser;
	private HtmlRenderer renderer;

	public IncludeMarkdown() {
		super(NAME, SOURCE, param(CHARSET, string(DEFAULT_CHARSET)));
		DataHolder options = configure();
		parser = Parser.builder(options)
			.build();
		renderer = HtmlRenderer.builder(options)
			.linkResolverFactory(new MarkdownLinkResolver.Factory())
			.build();
	}

	private DataHolder configure() {
		return PegdownOptionsAdapter.flexmarkOptions(true, Extensions.ALL & ~-Extensions.ANCHORLINKS);
	}

	@Override
	public TemplateImmediateExpression evaluate(TemplateInterpreter interpreter, Scope parent, List<TemplateVariable> arguments) {
		try {
			List<TemplateVariable> variables = createVariables(arguments);

			String source = findVariable(SOURCE, variables)
				.orElseThrow(() -> new ArgumentRequiredException(SOURCE))
				.getValue().apply(interpreter, parent)
				.getText();
			String charset = findVariable(CHARSET, variables)
				.orElse(var(CHARSET, string(DEFAULT_CHARSET)))
				.getValue().apply(interpreter, parent)
				.getText();

			String base = parent.resolveContextVariable(TemplateProcessor.SOURCE)
				.map(v -> v.getValue().apply(interpreter, parent).getText())
				.orElseThrow(() -> new ContextRequiredException(TemplateProcessor.SOURCE));

			String linkbase = parent.resolveContextVariable(LINKBASE)
				.map(v -> v.getValue().apply(interpreter, parent).getText())
				.orElse("");

			String document = loadDocument(base, source, charset);
			Document node = parser.parse(document);

			node.set(MarkdownLinkResolver.LINKBASE, linkbase);
			String html = renderer.render(node);
			return new RawText(html);
		} catch (IOException e) {
			return new IOResolutionError(e.getMessage());
		}

	}

	public String loadDocument(String base, String source, String charset) throws IOException {
		Path file = Paths.get(source);
		if (!Files.exists(file)) {
			file = Paths.get(base, source);
		}

		return new String(Files.readAllBytes(file), Charset.forName(charset));
	}

}
