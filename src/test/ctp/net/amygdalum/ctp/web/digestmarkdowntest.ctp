import net.amygdalum.ctp.html.htmlattributes.*

digestMarkdownConfig ::= [
  more = "read more"
]

testDigestMarkdown ::= linkbase(linkbase="base/", in=digestMarkdown(source="src/test/resources/markdown/digestablemarkdown.md", link="digestablemarkdown.html"))
	.htmlEqualTo(
	"<h1>This Heading is linked</h1>"
	~"<p>This<em>markdown</em>can is part of the<strong>digest</strong></p>"
	~"<p><a href=\"base/digestablemarkdown.html\">read more</a></p>")

testDigestMarkdownWithSubsequentText ::= linkbase(linkbase="base/", in=digestMarkdown(source="src/test/resources/markdown/digestablemarkdown.md", link="digestablemarkdown.html")~"other text")
    .htmlEqualTo(
    "<h1>This Heading is linked</h1>"
    ~"<p>This<em>markdown</em>can is part of the<strong>digest</strong></p>"
    ~"<p><a href=\"base/digestablemarkdown.html\">read more</a></p>"
    ~"other text")

testDigestMarkdownTranslateHeading ::= linkbase(linkbase="base/", in=digestMarkdown(source="src/test/resources/markdown/markdownheadings.md", link="digestablemarkdown.html", translateHeading=1))
    .htmlEqualTo("<h2>h1</h2><h3>h2</h3><h4>h3</h4><h5>h4</h5><h6>h5</h6><h6>h6</h6>")

testDigestMarkdownNegativeTranslateHeading ::= linkbase(linkbase="base/", in=digestMarkdown(source="src/test/resources/markdown/markdownheadings.md", link="digestablemarkdown.html", translateHeading=-1))
    .htmlEqualTo("<h1>h1</h1><h1>h2</h1><h2>h3</h2><h3>h4</h3><h4>h5</h4><h5>h6</h5>")

linkbase(linkbase, in) ::= in
	