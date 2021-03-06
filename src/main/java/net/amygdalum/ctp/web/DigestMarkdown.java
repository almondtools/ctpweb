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
import java.util.List;

import com.vladsch.flexmark.ast.Document;
import com.vladsch.flexmark.ast.Heading;
import com.vladsch.flexmark.ast.Link;
import com.vladsch.flexmark.ast.Node;
import com.vladsch.flexmark.ast.NodeVisitor;
import com.vladsch.flexmark.ast.Paragraph;
import com.vladsch.flexmark.ast.Text;
import com.vladsch.flexmark.ast.ThematicBreak;
import com.vladsch.flexmark.ast.VisitHandler;
import com.vladsch.flexmark.html.HtmlRenderer;
import com.vladsch.flexmark.parser.Parser;
import com.vladsch.flexmark.profiles.pegdown.Extensions;
import com.vladsch.flexmark.profiles.pegdown.PegdownOptionsAdapter;
import com.vladsch.flexmark.util.options.DataHolder;
import com.vladsch.flexmark.util.sequence.CharSubSequence;

import net.amygdalum.comtemplate.engine.ArgumentRequiredException;
import net.amygdalum.comtemplate.engine.Scope;
import net.amygdalum.comtemplate.engine.TemplateDefinition;
import net.amygdalum.comtemplate.engine.TemplateExpression;
import net.amygdalum.comtemplate.engine.TemplateImmediateExpression;
import net.amygdalum.comtemplate.engine.TemplateInterpreter;
import net.amygdalum.comtemplate.engine.TemplateVariable;
import net.amygdalum.comtemplate.engine.expressions.EvalAttribute;
import net.amygdalum.comtemplate.engine.expressions.IOResolutionError;
import net.amygdalum.comtemplate.engine.expressions.IntegerLiteral;
import net.amygdalum.comtemplate.engine.expressions.MapLiteral;
import net.amygdalum.comtemplate.engine.expressions.RawText;
import net.amygdalum.comtemplate.processor.TemplateProcessor;

public class DigestMarkdown extends TemplateDefinition {

	public static final String NAME = "digestMarkdown";
	public static final String SOURCE = "source";
	public static final String LINK = "link";
	public static final String CONFIG = "digestMarkdownConfig";
	public static final String TRANSLATE_HEADING = "translateHeading";
	public static final String CHARSET = "charset";
	public static final String LINKBASE = "linkbase";

	private static final String DEFAULT_CHARSET = "utf-8";

	private Parser parser;
	private HtmlRenderer renderer;

	public DigestMarkdown() {
		super(NAME, SOURCE, LINK, param(CHARSET, string(DEFAULT_CHARSET)), param(TRANSLATE_HEADING, IntegerLiteral.integer(0)));
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
			int translate = findVariable(TRANSLATE_HEADING, variables)
				.orElse(var(TRANSLATE_HEADING, integer(0)))
				.getValue().apply(interpreter, parent)
				.as(Integer.class);
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
			String more = new EvalAttribute(config, "more").apply(interpreter, parent).getText();

			String document = loadDocument(base, source, charset);
			Document node = parser.parse(document);
			node.set(MarkdownLinkResolver.LINKBASE, linkbase);

			Node toDelete = node.getFirstChildAny(ThematicBreak.class);
			if (toDelete != null) {
				while (toDelete != null) {
					Node next = toDelete.getNext();
					toDelete.unlink();
					toDelete = next;
				}
				node.appendChild(buildMoreLink(more, link));
			}

			translateHeadings(node, interpreter, parent, translate);

			String html = renderer.render(node);
			return new RawText(html);
		} catch (IOException e) {
			return new IOResolutionError(e.getMessage());
		}

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
