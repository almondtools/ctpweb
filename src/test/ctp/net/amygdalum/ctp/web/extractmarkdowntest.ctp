import net.amygdalum.ctp.html.htmlattributes.*

testExtractingMarkdown ::= extractMarkdown(source="src/test/resources/markdown/markdown.md",selector="h1")
	.equalTo("Hello World")

testExtractingMarkdownLinkbase ::= linkbase(linkbase="base/", in=extractMarkdown(source="src/test/resources/markdown/markdownwikilink.md", selector="[href=base/url]"))
    .equalTo("wikilink")


linkbase(linkbase, in) ::= in
	