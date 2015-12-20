package com.almondtools.ctpweb;

import static com.almondtools.comtemplate.engine.expressions.StringLiteral.string;
import static java.util.Arrays.asList;
import static java.util.Collections.emptyList;
import static java.util.stream.Collectors.toList;

import java.util.List;

import com.almondtools.comtemplate.engine.Scope;
import com.almondtools.comtemplate.engine.TemplateImmediateExpression;
import com.almondtools.comtemplate.engine.expressions.Evaluated;
import com.almondtools.comtemplate.engine.expressions.RawText;
import com.almondtools.comtemplate.engine.expressions.StringLiteral;
import com.almondtools.comtemplate.engine.resolvers.FunctionResolver;

public class EscapeHtml extends FunctionResolver {

	public EscapeHtml() {
		super("escapeHtml");
	}

	@Override
	public TemplateImmediateExpression resolve(TemplateImmediateExpression base, List<TemplateImmediateExpression> arguments, Scope scope) {
		if (base instanceof StringLiteral) {
			return string(escapeHtml(((StringLiteral) base).getText()));
		} else if (base instanceof RawText) {
			return new RawText(escapeHtml(((RawText) base).getText()));
		} else if (base instanceof Evaluated) {
			List<TemplateImmediateExpression> evaluated = ((Evaluated) base).getEvaluated().stream()
				.map(part -> resolve(part, emptyList(), scope))
				.collect(toList());
			return new Evaluated(evaluated);
		} else {
			return base;
		}
	}

	private String escapeHtml(String text) {
		StringBuilder out = new StringBuilder();
	    for (int i = 0; i < text.length(); i++) {
	        char c = text.charAt(i);
	        switch(c) {
	        case '"':
	        	out.append("&quot;");
	        	break;
	        case '<':
	        	out.append("&lt;");
	        	break;
	        case '>':
	        	out.append("&gt;");
	        	break;
	        case '&':
	        	out.append("&amp;");
	        	break;
	        default:
	        	if (c > 127) {
	        		out.append("&#");
	        		out.append((int) c);
	        		out.append(';');
	        	} else {
	        		out.append(c);
	        	}
	        }
	    }
	    return out.toString();
	}

	@Override
	public List<Class<? extends TemplateImmediateExpression>> getResolvedClasses() {
		return asList(TemplateImmediateExpression.class);
	}

}
