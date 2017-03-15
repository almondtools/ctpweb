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

import org.pegdown.LinkRenderer;
import org.pegdown.PegDownProcessor;
import org.pegdown.ast.ExpLinkNode;
import org.pegdown.ast.Node;

import com.almondtools.comtemplate.engine.ArgumentRequiredException;
import com.almondtools.comtemplate.engine.Scope;
import com.almondtools.comtemplate.engine.TemplateDefinition;
import com.almondtools.comtemplate.engine.TemplateImmediateExpression;
import com.almondtools.comtemplate.engine.TemplateInterpreter;
import com.almondtools.comtemplate.engine.TemplateVariable;
import com.almondtools.comtemplate.engine.expressions.IOResolutionError;
import com.almondtools.comtemplate.engine.expressions.RawText;
import com.almondtools.comtemplate.processor.TemplateProcessor;

public class IncludeMarkdown extends TemplateDefinition {

    public static final String NAME = "includeMarkdown";
    public static final String SOURCE = "source";
    public static final String CHARSET = "charset";
    public static final String LINKBASE = "linkbase";

    private static final String DEFAULT_CHARSET = "utf-8";

    private PegDownProcessor processor;

    public IncludeMarkdown() {
        super(NAME, SOURCE, param(CHARSET, string(DEFAULT_CHARSET)));
        this.processor = new PegDownProcessor();
    }

    @Override
    public TemplateImmediateExpression evaluate(TemplateInterpreter interpreter, Scope parent, List<TemplateVariable> arguments) {
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
            .getValue().apply(interpreter, parent)
            .getText();

        String linkbase = parent.resolveContextVariable(LINKBASE) == null
            ? ""
            : parent.resolveContextVariable(LINKBASE)
                .getValue().apply(interpreter, parent)
                .getText();

        try {
            String document = loadDocument(base, source, charset);
            String html = processor.markdownToHtml(document, new LinkRenderer() {
                public Rendering render(org.pegdown.ast.ExpLinkNode node, String text) {
                    Node child = node.getChildren().isEmpty() ? null : node.getChildren().get(0);
                    node = new ExpLinkNode(node.title, linkbase + node.url, child);
                    return super.render(node, text);
                };
            });
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
