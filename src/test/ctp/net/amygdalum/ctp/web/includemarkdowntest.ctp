import net.amygdalum.ctp.html.htmlattributes.*

testIncludingMarkdown ::= includeMarkdown(source="src/test/resources/markdown/markdown.md")
	.htmlEqualTo("<h1>Hello World</h1><p>This<em>markdown</em>can be<strong>included</strong></p>")

testIncludingMarkdownWithWikiLink ::= includeMarkdown(source="src/test/resources/markdown/markdownwikilink.md")
    .htmlEqualTo("<p>This is a labeled<a href=\"url\">wikilink</a><br />This is a refence<a href=\"refurl\">wikilink</a></p>")

    
testIncludingMarkdownLinkbase ::= linkbase(linkbase="base/", in=includeMarkdown(source="src/test/resources/markdown/markdownwikilink.md"))
    .htmlEqualTo("<p>This is a labeled<a href=\"base/url\">wikilink</a><br />This is a refence<a href=\"base/refurl\">wikilink</a></p>")

linkbase(linkbase, in) ::= in
	