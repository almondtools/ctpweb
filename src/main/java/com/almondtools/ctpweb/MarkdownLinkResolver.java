package com.almondtools.ctpweb;

import java.net.URI;
import java.net.URISyntaxException;
import java.util.Set;

import com.vladsch.flexmark.ast.Node;
import com.vladsch.flexmark.html.LinkResolver;
import com.vladsch.flexmark.html.LinkResolverFactory;
import com.vladsch.flexmark.html.renderer.LinkResolverContext;
import com.vladsch.flexmark.html.renderer.LinkType;
import com.vladsch.flexmark.html.renderer.ResolvedLink;
import com.vladsch.flexmark.util.html.Attributes;
import com.vladsch.flexmark.util.options.DataKey;

public class MarkdownLinkResolver implements LinkResolver {

	public static final DataKey<String> LINKBASE = new DataKey<>("linkbase", "");

	public MarkdownLinkResolver() {
	}

	@Override
	public ResolvedLink resolveLink(Node node, LinkResolverContext context, ResolvedLink link) {
		LinkType linkType = link.getLinkType();
		String url = link.getUrl();
		if (isRelative(url)) {
			url = context.getOptions().get(LINKBASE) + url;
		}
		Attributes attributes = link.getAttributes();
		return new ResolvedLink(linkType, url, attributes);
	}

	protected boolean isRelative(String url) {
		try {
			URI uri = new URI(url);
			if (uri.isAbsolute()) {
				return false;
			} else if (uri.getPath().startsWith("/")) {
				return false;
			}
			return true;
		} catch (URISyntaxException e) {
			return false;
		}
	}

	public static class Factory implements LinkResolverFactory {

		@Override
		public Set<Class<? extends LinkResolverFactory>> getAfterDependents() {
			return null;
		}

		@Override
		public Set<Class<? extends LinkResolverFactory>> getBeforeDependents() {
			return null;
		}

		@Override
		public boolean affectsGlobalScope() {
			return false;
		}

		@Override
		public LinkResolver create(LinkResolverContext context) {
			return new MarkdownLinkResolver();
		}

	}

}