import net.amygdalum.ctp.html.htmlattributes.*

testIncludingHtml ::= includeHtml(source="src/test/resources/html/html.html", select="html")
	.htmlEqualTo("<head></head><body><h1>Hello World</h1>This<em>html</em>can be<strong>included</strong></body>")

testIncludingBody ::= includeHtml(source="src/test/resources/html/html.html")
	.htmlEqualTo("<h1>Hello World</h1>This<em>html</em>can be<strong>included</strong>")

	