import com.almondtools.ctpweb.html.*

testHtml ::= html(content="content", attributes=["a","b"]).htmlEqualTo("<html a b>content</html>")

testHead ::= head(content="content", attributes=["a","b"]).htmlEqualTo("<head a b>content</head>")

testBody ::= body(content="content", attributes=["a","b"]).htmlEqualTo("<body a b>content</body>")

testH1 ::= h1(content="content", attributes=["a","b"]).htmlEqualTo("<h1 a b>content</h1>")

testH2 ::= h2(content="content", attributes=["a","b"]).htmlEqualTo("<h2 a b>content</h2>")

testH3 ::= h3(content="content", attributes=["a","b"]).htmlEqualTo("<h3 a b>content</h3>")

testH4 ::= h4(content="content", attributes=["a","b"]).htmlEqualTo("<h4 a b>content</h4>")

testH5 ::= h5(content="content", attributes=["a","b"]).htmlEqualTo("<h5 a b>content</h5>")

testH6 ::= h6(content="content", attributes=["a","b"]).htmlEqualTo("<h6 a b>content</h6>")

testP ::= p(content="content", attributes=["a","b"]).htmlEqualTo("<p a b>content</p>")

