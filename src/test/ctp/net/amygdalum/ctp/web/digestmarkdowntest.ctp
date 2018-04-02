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

linkbase(linkbase, in) ::= in
	