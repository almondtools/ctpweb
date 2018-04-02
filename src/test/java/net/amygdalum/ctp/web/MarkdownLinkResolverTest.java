package net.amygdalum.ctp.web;

import static org.hamcrest.Matchers.is;
import static org.junit.Assert.assertThat;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import net.amygdalum.ctp.web.MarkdownLinkResolver;

public class MarkdownLinkResolverTest {

	private MarkdownLinkResolver resolver;

	@BeforeEach
	public void before() throws Exception {
		resolver = new MarkdownLinkResolver();
	}

	@Test
	public void testIsRelative() throws Exception {
		assertThat(resolver.isRelative("http://www.amygdalum.net"), is(false));
		assertThat(resolver.isRelative("/amygdalum"), is(false));
		assertThat(resolver.isRelative("amygdalum"), is(true));
	}

}
