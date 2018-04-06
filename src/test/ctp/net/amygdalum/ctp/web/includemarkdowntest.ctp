import net.amygdalum.ctp.html.htmlattributes.*

testIncludingMarkdown ::= includeMarkdown(source="src/test/resources/markdown/markdown.md")
	.htmlEqualTo("<h1>Hello World</h1><p>This<em>markdown</em>can be<strong>included</strong></p>")

testIncludingMarkdownWithWikiLink ::= includeMarkdown(source="src/test/resources/markdown/markdownwikilink.md")
    .htmlEqualTo("<p>This is a labeled<a href=\"url\">wikilink</a><br />This is a refence<a href=\"refurl\">wikilink</a></p>")

    
testIncludingMarkdownLinkbase ::= linkbase(linkbase="base/", in=includeMarkdown(source="src/test/resources/markdown/markdownwikilink.md"))
    .htmlEqualTo("<p>This is a labeled<a href=\"base/url\">wikilink</a><br />This is a refence<a href=\"base/refurl\">wikilink</a></p>")

testIncludingMarkdownTranslateHeading ::= includeMarkdown(source="src/test/resources/markdown/markdownheadings.md", translateHeading=1)
    .htmlEqualTo("<h2>h1</h2><h3>h2</h3><h4>h3</h4><h5>h4</h5><h6>h5</h6><h6>h6</h6>")

testIncludingMarkdownNegativeTranslateHeading ::= includeMarkdown(source="src/test/resources/markdown/markdownheadings.md", translateHeading=-1)
    .htmlEqualTo("<h1>h1</h1><h1>h2</h1><h2>h3</h2><h3>h4</h3><h4>h5</h4><h5>h6</h5>")

linkbase(linkbase, in) ::= in
	