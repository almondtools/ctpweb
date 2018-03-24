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
import com.almondtools.comtemplate.engine.Scope;
import com.almondtools.comtemplate.engine.TemplateDefinition;
import com.almondtools.comtemplate.engine.TemplateExpression;
import com.almondtools.comtemplate.engine.TemplateImmediateExpression;
import com.almondtools.comtemplate.engine.TemplateInterpreter;
import com.almondtools.comtemplate.engine.TemplateVariable;
import com.almondtools.comtemplate.engine.expressions.EvalAttribute;
import com.almondtools.comtemplate.engine.expressions.IOResolutionError;
import com.almondtools.comtemplate.engine.expressions.MapLiteral;
import com.almondtools.comtemplate.engine.expressions.RawText;
import com.almondtools.comtemplate.processor.TemplateProcessor;
import com.vladsch.flexmark.ast.Document;
import com.vladsch.flexmark.ast.Link;
import com.vladsch.flexmark.ast.Node;
import com.vladsch.flexmark.ast.Paragraph;
import com.vladsch.flexmark.ast.Text;
import com.vladsch.flexmark.ast.ThematicBreak;
import com.vladsch.flexmark.html.HtmlRenderer;
import com.vladsch.flexmark.parser.Parser;
import com.vladsch.flexmark.profiles.pegdown.Extensions;
import com.vladsch.flexmark.profiles.pegdown.PegdownOptionsAdapter;
import com.vladsch.flexmark.util.options.DataHolder;
import com.vladsch.flexmark.util.sequence.CharSubSequence;

public class DigestMarkdown extends TemplateDefinition {

	public static final String NAME = "digestMarkdown";
	public static final String SOURCE = "source";
	public static final String LINK = "link";
	public static final String CONFIG = "digestMarkdownConfig";
	public static final String CHARSET = "charset";
	public static final String LINKBASE = "linkbase";

	private static final String DEFAULT_CHARSET = "utf-8";

	private Parser parser;
	private HtmlRenderer renderer;

	public DigestMarkdown() {
		super(NAME, SOURCE, LINK, param(CHARSET, string(DEFAULT_CHARSET)));
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
			String link = findVariable(LINK, variables)
				.orElseThrow(() -> new ArgumentRequiredException(LINK))
				.getValue().apply(interpreter, parent)
				.getText();
			String charset = findVariable(CHARSET, variables)
				.orElse(var(CHARSET, string(DEFAULT_CHARSET)))
				.getValue().apply(interpreter, parent)
				.getText();

			String base = parent.resolveContextVariable(TemplateProcessor.SOURCE)
				.map(v -> v.getValue().apply(interpreter, parent).getText())
				.orElseThrow(() -> new ArgumentRequiredException(TemplateProcessor.SOURCE));

			String linkbase = parent.resolveContextVariable(LINKBASE)
				.map(v -> v.getValue().apply(interpreter, parent).getText())
				.orElse("");
			TemplateExpression config = parent.resolveContextVariable(CONFIG)
				.map(v -> v.getValue())
				.orElse(MapLiteral.map());
			String more = new EvalAttribute(config, "more").apply(interpreter,parent).getText();

			String document = loadDocument(base, source, charset);
			Document node = parser.parse(document);
			node.set(MarkdownLinkResolver.LINKBASE, linkbase);

			Node toDelete = node.getFirstChildAny(ThematicBreak.class);
			
			while (toDelete != null) {
				Node next = toDelete.getNext();
				toDelete.unlink();
				toDelete = next;
			}
					
			node.appendChild(buildMoreLink(more, link));

			String html = renderer.render(node);
			return new RawText(html);
		} catch (IOException e) {
			return new IOResolutionError(e.getMessage());
		}

	}

	private Node buildMoreLink(String more, String link) {
		Node moreLink = new Paragraph();
		Link a = new Link();
		a.setUrl(CharSubSequence.of(link));
		a.appendChild(new Text(CharSubSequence.of(more)));
		moreLink.appendChild(a);
		return moreLink;
	}

	public String loadDocument(String base, String source, String charset) throws IOException {
		Path file = Paths.get(source);
		if (!Files.exists(file)) {
			file = Paths.get(base, source);
		}

		return new String(Files.readAllBytes(file), Charset.forName(charset));
	}

}
