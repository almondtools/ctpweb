package net.amygdalum.ctp.web;

import static net.amygdalum.comtemplate.engine.TemplateParameter.param;
import static net.amygdalum.comtemplate.engine.TemplateVariable.var;
import static net.amygdalum.comtemplate.engine.expressions.StringLiteral.string;

import java.io.File;
import java.io.IOException;
import java.nio.file.Path;
import java.util.Arrays;
import java.util.Collections;
import java.util.List;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;

import net.amygdalum.comtemplate.engine.ArgumentRequiredException;
import net.amygdalum.comtemplate.engine.Scope;
import net.amygdalum.comtemplate.engine.TemplateDefinition;
import net.amygdalum.comtemplate.engine.TemplateExpression;
import net.amygdalum.comtemplate.engine.TemplateImmediateExpression;
import net.amygdalum.comtemplate.engine.TemplateInterpreter;
import net.amygdalum.comtemplate.engine.TemplateVariable;
import net.amygdalum.comtemplate.engine.WithArguments;
import net.amygdalum.comtemplate.engine.expressions.IOResolutionError;
import net.amygdalum.comtemplate.engine.expressions.RawText;
import net.amygdalum.comtemplate.engine.templates.FileDependent;
import net.amygdalum.comtemplate.processor.TemplateProcessor;

public class IncludeHtml extends TemplateDefinition implements FileDependent {

    public static final String NAME = "includeHtml";
    public static final String SOURCE = "source";
    public static final String CHARSET = "charset";
    public static final String SELECT = "select";

    private static final String DEFAULT_SELECT = "body";
    private static final String DEFAULT_CHARSET = "utf-8";

    public IncludeHtml() {
        super(NAME, SOURCE, param(CHARSET, string(DEFAULT_CHARSET)), param(SELECT, string(DEFAULT_SELECT)));
    }

    @Override
    public List<Path> files(TemplateInterpreter interpreter, Scope parent, TemplateExpression expression) {
        if (!(expression instanceof WithArguments)) {
            return Collections.emptyList();
        }
        List<TemplateVariable> variables = createVariables(((WithArguments) expression).getArguments());

        String source = findVariable(SOURCE, variables)
            .orElseThrow(() -> new ArgumentRequiredException(SOURCE))
            .getValue().apply(interpreter, parent)
            .getText();
        String base = parent.resolveContextVariable(TemplateProcessor.SOURCE)
            .map(v -> v.getValue().apply(interpreter, parent).getText())
            .orElse(null);

        Path path = pathOf(base, source);
        return Arrays.asList(path);
    }

    @Override
    public TemplateImmediateExpression evaluate(TemplateInterpreter interpreter, Scope parent, List<TemplateVariable> arguments) {
        try {
            List<TemplateVariable> variables = createVariables(arguments);

            String source = findVariable(SOURCE, variables)
                .orElseThrow(() -> new ArgumentRequiredException(SOURCE))
                .getValue().apply(interpreter, parent)
                .getText();
            String select = findVariable(SELECT, variables)
                .orElse(var(SELECT, string(DEFAULT_SELECT)))
                .getValue().apply(interpreter, parent)
                .getText();
            String charset = findVariable(CHARSET, variables)
                .orElse(var(CHARSET, string(DEFAULT_CHARSET)))
                .getValue().apply(interpreter, parent)
                .getText();

            String base = parent.resolveContextVariable(TemplateProcessor.SOURCE)
                .map(v -> v.getValue().apply(interpreter, parent).getText())
                .orElse(null);

            File file = fileOf(base, source);
            Document document = read(file, charset);

            Element selected = document.select(select).first();

            return new RawText(selected.html());
        } catch (IOException e) {
            return new IOResolutionError(e.getMessage());
        }

    }

    private Document read(File file, String charset) throws IOException {
        return Jsoup.parse(file, charset);
    }

}
