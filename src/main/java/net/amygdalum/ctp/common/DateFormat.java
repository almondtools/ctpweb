package net.amygdalum.ctp.common;

import static net.amygdalum.comtemplate.engine.expressions.StringLiteral.string;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.List;
import java.util.Locale;

import net.amygdalum.comtemplate.engine.Scope;
import net.amygdalum.comtemplate.engine.TemplateImmediateExpression;
import net.amygdalum.comtemplate.engine.expressions.ResolvedMapLiteral;
import net.amygdalum.comtemplate.engine.resolvers.MonomophousAdaptor;
import net.amygdalum.comtemplate.engine.resolvers.PolymorphousAdaptor;

public class DateFormat extends PolymorphousAdaptor {

	public DateFormat() {
		super("format", new Date(), new Time(), new DateTime());
	}

	public static class Date extends MonomophousAdaptor {

		public Date() {
			super("date");
		}

		@Override
		public TemplateImmediateExpression resolve(ResolvedMapLiteral base, List<TemplateImmediateExpression> arguments, Scope scope) {
			Calendar cal = new GregorianCalendar();
			Integer year = base.getAttribute("year").as(Integer.class);
			Integer month = base.getAttribute("month").as(Integer.class) - 1;
			Integer day = base.getAttribute("day").as(Integer.class);
			cal.set(year, month, day);

			String format = arguments.get(0).getText();
			Locale locale = arguments.size() >= 2 ? Locale.forLanguageTag(arguments.get(1).getText()) : Locale.getDefault();
			return string(new SimpleDateFormat(format, locale).format(cal.getTime()));
		}

	}

	public static class Time extends MonomophousAdaptor {

		public Time() {
			super("time");
		}

		@Override
		public TemplateImmediateExpression resolve(ResolvedMapLiteral base, List<TemplateImmediateExpression> arguments, Scope scope) {
			Calendar cal = new GregorianCalendar();
			Integer hour = base.getAttribute("hours").as(Integer.class);
			Integer minute = base.getAttribute("minutes").as(Integer.class);
			Integer second = base.getAttribute("seconds").as(Integer.class);
			Integer millisecond = base.getAttribute("milliseconds").as(Integer.class);
			cal.set(0, 0, 0, hour, minute, second);
			cal.set(Calendar.MILLISECOND, millisecond);

			String format = arguments.get(0).getText();
			Locale locale = arguments.size() >= 2 ? Locale.forLanguageTag(arguments.get(1).getText()) : Locale.getDefault();
			return string(new SimpleDateFormat(format, locale).format(cal.getTime()));
		}

	}

	public static class DateTime extends MonomophousAdaptor {

		public DateTime() {
			super("datetime");
		}

		@Override
		public TemplateImmediateExpression resolve(ResolvedMapLiteral base, List<TemplateImmediateExpression> arguments, Scope scope) {
			Calendar cal = new GregorianCalendar();
			Integer year = base.getAttribute("year").as(Integer.class);
			Integer month = base.getAttribute("month").as(Integer.class) - 1;
			Integer day = base.getAttribute("day").as(Integer.class);
			Integer hour = base.getAttribute("hours").as(Integer.class);
			Integer minute = base.getAttribute("minutes").as(Integer.class);
			Integer second = base.getAttribute("seconds").as(Integer.class);
			Integer millisecond = base.getAttribute("milliseconds").as(Integer.class);
			cal.set(year, month, day, hour, minute, second);
			cal.set(Calendar.MILLISECOND, millisecond);

			String format = arguments.get(0).getText();
			Locale locale = arguments.size() >= 2 ? Locale.forLanguageTag(arguments.get(1).getText()) : Locale.getDefault();
			return string(new SimpleDateFormat(format, locale).format(cal.getTime()));
		}

	}
}
