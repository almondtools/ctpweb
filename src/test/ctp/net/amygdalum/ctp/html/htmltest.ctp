import net.amygdalum.ctp.html.html.*

testHtml ::= html(content="content", attributes=["a","b"]).htmlEqualTo('<html a b>content</html>')

testHead ::= head(content="content", attributes=["a","b"]).htmlEqualTo('<head a b>content</head>')

testBody ::= body(content="content", attributes=["a","b"]).htmlEqualTo('<body a b>content</body>')

testNav ::= nav(content="content", attributes=["a","b"]).htmlEqualTo('<nav a b>content</nav>')

testHeader ::= header(content="content", attributes=["a","b"]).htmlEqualTo('<header a b>content</header>')

testFooter ::= footer(content="content", attributes=["a","b"]).htmlEqualTo('<footer a b>content</footer>')

testSection ::= section(content="content", attributes=["a","b"]).htmlEqualTo('<section a b>content</section>')

testTitle ::= title(content="mytitle", attributes=["a","b"]).htmlEqualTo('<title a b>mytitle</title>')
testMeta ::= meta(attributes=["a","b"]).htmlEqualTo('<meta a b/>')

testLink ::= link(attributes=["a","b"]).htmlEqualTo('<link a b/>')

testScript ::= script(content="content", attributes=["a","b"]).htmlEqualTo('<script a b>content</script>')

testH1 ::= h1(content="content", attributes=["a","b"]).htmlEqualTo('<h1 a b>content</h1>')

testH2 ::= h2(content="content", attributes=["a","b"]).htmlEqualTo('<h2 a b>content</h2>')

testH3 ::= h3(content="content", attributes=["a","b"]).htmlEqualTo('<h3 a b>content</h3>')

testH4 ::= h4(content="content", attributes=["a","b"]).htmlEqualTo('<h4 a b>content</h4>')

testH5 ::= h5(content="content", attributes=["a","b"]).htmlEqualTo('<h5 a b>content</h5>')

testH6 ::= h6(content="content", attributes=["a","b"]).htmlEqualTo('<h6 a b>content</h6>')

testP ::= p(content="content", attributes=["a","b"]).htmlEqualTo('<p a b>content</p>')

testDiv ::= div(content="content", attributes=["a","b"]).htmlEqualTo('<div a b>content</div>')

testSpan ::= span(content="content", attributes=["a","b"]).htmlEqualTo('<span a b>content</span>')

testButton ::= button(content="content", attributes=["a","b"]).htmlEqualTo('<button a b>content</button>')

testA ::= a(content="content", attributes=["a","b"]).htmlEqualTo('<a a b>content</a>')

testUl ::= ul(content="content", attributes=["a","b"]).htmlEqualTo('<ul a b>content</ul>')

testOl ::= ol(content="content", attributes=["a","b"]).htmlEqualTo('<ol a b>content</ol>')

testLi ::= li(content="content", attributes=["a","b"]).htmlEqualTo('<li a b>content</li>')

testStrong ::= strong(content="content", attributes=["a","b"]).htmlEqualTo('<strong a b>content</strong>')

testEm ::= em(content="content", attributes=["a","b"]).htmlEqualTo('<em a b>content</em>')

testSmall ::= small(content="content", attributes=["a","b"]).htmlEqualTo('<small a b>content</small>')

testCode ::= code(content="content", attributes=["a","b"]).htmlEqualTo('<code a b>content</code>')

testPre ::= pre(content="content", attributes=["a","b"]).htmlEqualTo('<pre a b>content</pre>')
