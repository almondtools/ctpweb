package net.amygdalum.ctp.web;

import static net.amygdalum.comtemplate.engine.TemplateParameter.param;
import static net.amygdalum.comtemplate.engine.TemplateVariable.var;
import static net.amygdalum.comtemplate.engine.expressions.IntegerLiteral.integer;
import static net.amygdalum.comtemplate.engine.expressions.StringLiteral.string;

import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import com.vladsch.flexmark.Extension;
import com.vladsch.flexmark.ast.Document;
import com.vladsch.flexmark.ast.Heading;
import com.vladsch.flexmark.ast.NodeVisitor;
import com.vladsch.flexmark.ast.VisitHandler;
import com.vladsch.flexmark.ext.jekyll.tag.JekyllTag;
import com.vladsch.flexmark.ext.jekyll.tag.JekyllTagExtension;
import com.vladsch.flexmark.html.HtmlRenderer;
import com.vladsch.flexmark.parser.Parser;
import com.vladsch.flexmark.profiles.pegdown.Extensions;
import com.vladsch.flexmark.profiles.pegdown.PegdownOptionsAdapter;
import com.vladsch.flexmark.util.options.DataHolder;
import com.vladsch.flexmark.util.options.MutableDataSet;

import net.amygdalum.comtemplate.engine.ArgumentRequiredException;
import net.amygdalum.comtemplate.engine.ContextRequiredException;
import net.amygdalum.comtemplate.engine.Scope;
import net.amygdalum.comtemplate.engine.TemplateDefinition;
import net.amygdalum.comtemplate.engine.TemplateImmediateExpression;
import net.amygdalum.comtemplate.engine.TemplateInterpreter;
import net.amygdalum.comtemplate.engine.TemplateVariable;
import net.amygdalum.comtemplate.engine.expressions.EvalTemplateFunction;
import net.amygdalum.comtemplate.engine.expressions.IOResolutionError;
import net.amygdalum.comtemplate.engine.expressions.RawText;
import net.amygdalum.comtemplate.processor.TemplateProcessor;

public class IncludeMarkdown extends TemplateDefinition {

	public static final String NAME = "includeMarkdown";
	public static final String SOURCE = "source";
	public static final String CHARSET = "charset";
	public static final String TRANSLATE_HEADING = "translateHeading";
	public static final String LINKBASE = "linkbase";

	private static final String DEFAULT_CHARSET = "utf-8";

	private Parser parser;
	private HtmlRenderer renderer;

	public IncludeMarkdown() {
		super(NAME, SOURCE, param(CHARSET, string(DEFAULT_CHARSET)), param(TRANSLATE_HEADING, integer(0)));
		DataHolder options = configure();
		parser = Parser.builder(options)
			.build();
		renderer = HtmlRenderer.builder(options)
			.linkResolverFactory(new MarkdownLinkResolver.Factory())
			.build();
	}

	private DataHolder configure() {
		MutableDataSet config = new MutableDataSet(PegdownOptionsAdapter.flexmarkOptions(true, Extensions.ALL & ~-Extensions.ANCHORLINKS));
		Iterable<Extension> base = config.get(Parser.EXTENSIONS);
		List<Extension> extensions = new ArrayList<>();
		for (Extension extension : base) {
			extensions.add(extension);
		}
		extensions.add(JekyllTagExtension.create());
		config.set(JekyllTagExtension.LIST_INCLUDES_ONLY, false);
		config.set(Parser.EXTENSIONS, extensions);
		return config;
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
			int translate = findVariable(TRANSLATE_HEADING, variables)
				.orElse(var(TRANSLATE_HEADING, integer(0)))
				.getValue().apply(interpreter, parent)
				.as(Integer.class);

			String base = parent.resolveContextVariable(TemplateProcessor.SOURCE)
				.map(v -> v.getValue().apply(interpreter, parent).getText())
				.orElseThrow(() -> new ContextRequiredException(TemplateProcessor.SOURCE));

			String linkbase = parent.resolveContextVariable(LINKBASE)
				.map(v -> v.getValue().apply(interpreter, parent).getText())
				.orElse("");

			String document = loadDocument(base, source, charset);
			Document node = parser.parse(document);

			computeIncludes(node, interpreter, parent);
			translateHeadings(node, interpreter, parent, translate);

			node.set(MarkdownLinkResolver.LINKBASE, linkbase);
			String html = renderer.render(node);
			return new RawText(html);
		} catch (IOException e) {
			return new IOResolutionError(e.getMessage());
		}

	}

	@SuppressWarnings("unlikely-arg-type")
	private void computeIncludes(Document doc, TemplateInterpreter interpreter, Scope scope) {
		Map<String, String> includes = new HashMap<>();
		List<JekyllTag> tags = doc.get(JekyllTagExtension.TAG_LIST);
		for (JekyllTag tag : tags) {
			String template = tag.getParameters().toString();
			if (tag.getTag().equals("include") && !template.isEmpty()) {
				String text = new EvalTemplateFunction(template, null).apply(interpreter, scope).getText();
				includes.put(template, text);
			}

		}
		doc.set(JekyllTagExtension.INCLUDED_HTML, includes);
	}

	private void translateHeadings(Document node, TemplateInterpreter interpreter, Scope parent, int translate) {
		if (translate != 0) {
			new NodeVisitor(new VisitHandler<>(Heading.class, heading -> {
				int level = heading.getLevel();
				int newLevel = level + translate;
				if (newLevel < 1) {
					heading.setLevel(1);
				} else if (newLevel > 6) {
					heading.setLevel(6);
				} else {
					heading.setLevel(newLevel);
				}
			})).visit(node);
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
