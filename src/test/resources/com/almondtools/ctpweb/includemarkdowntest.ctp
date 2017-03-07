import com.almondtools.ctpweb.htmlattributes.*

testIncludingMarkdown ::= includeMarkdown(source="src/test/resources/markdown/markdown.md")
	.htmlEqualTo("<h1>Hello World</h1><p>This<em>markdown</em>can be<strong>included</strong></p>")
