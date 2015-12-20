package com.almondtools.ctpweb;

import static com.almondtools.comtemplate.engine.expressions.StringLiteral.string;
import static java.util.stream.Collectors.joining;
import static java.util.stream.Collectors.toList;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.LinkedHashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import java.util.stream.Stream;

import com.almondtools.comtemplate.engine.Resolver;
import com.almondtools.comtemplate.engine.Scope;
import com.almondtools.comtemplate.engine.TemplateImmediateExpression;
import com.almondtools.comtemplate.engine.expressions.ResolvedListLiteral;
import com.almondtools.comtemplate.engine.resolvers.ExclusiveTypeFunctionResolver;

public class MergeHtmlAttributes extends ExclusiveTypeFunctionResolver<ResolvedListLiteral> implements Resolver {

	private static final Pattern HTML_ATTRIBUTE = Pattern.compile("([\\w\\-_]+)=\"(.+?)\"");

	public MergeHtmlAttributes() {
		super(ResolvedListLiteral.class, "mergeHtmlAttributes");
	}

	@Override
	public TemplateImmediateExpression resolveTyped(ResolvedListLiteral base, List<TemplateImmediateExpression> arguments, Scope scope) {
		Map<String, Set<String>> grouped = new LinkedHashMap<>();
		List<TemplateImmediateExpression> remainder = new ArrayList<>();
		for (TemplateImmediateExpression expression : base.getList()) {
			Matcher m = HTML_ATTRIBUTE.matcher(expression.getText());
			if (m.matches()) {
				Set<String> values = grouped.computeIfAbsent(m.group(1), key -> new LinkedHashSet<>());
				values.add(m.group(2));
			} else {
				remainder.add(expression);
			}
		}
		List<TemplateImmediateExpression> attributes = Stream.concat(
			grouped.entrySet().stream()
				.map(entry -> entry.getKey() + "=" + entry.getValue().stream().map(text -> text.trim()).collect(joining(" ", "\"", "\"")))
				.map(text -> (TemplateImmediateExpression) string(text)),
			remainder.stream())
			.collect(toList());
		return new ResolvedListLiteral(attributes);
	}

}
