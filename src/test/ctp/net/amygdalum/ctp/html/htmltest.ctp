import net.amygdalum.ctp.html.html.*

testDoctype ::= doctype("xml").htmlEqualTo('<!DOCTYPE xml>')
testDoctypeDefaults ::= doctype().htmlEqualTo('<!DOCTYPE html>')

testHtml ::= html(content="content", attributes=["a","b"]).htmlEqualTo('<html a b>content</html>')
testHtmlDefaults ::= html().htmlEqualTo('<html></html>')

testHead ::= head(content="content", attributes=["a","b"]).htmlEqualTo('<head a b>content</head>')
testHeadDefaults ::= head().htmlEqualTo('<head></head>')

testBody ::= body(content="content", attributes=["a","b"]).htmlEqualTo('<body a b>content</body>')
testBodyDefaults ::= body().htmlEqualTo('<body></body>')

testNav ::= nav(content="content", attributes=["a","b"]).htmlEqualTo('<nav a b>content</nav>')
testNavDefaults ::= nav().htmlEqualTo('<nav></nav>')

testHeader ::= header(content="content", attributes=["a","b"]).htmlEqualTo('<header a b>content</header>')
testHeaderDefaults ::= header().htmlEqualTo('<header></header>')

testFooter ::= footer(content="content", attributes=["a","b"]).htmlEqualTo('<footer a b>content</footer>')
testFooterDefaults ::= footer().htmlEqualTo('<footer></footer>')

testSection ::= section(content="content", attributes=["a","b"]).htmlEqualTo('<section a b>content</section>')
testSectionDefaults ::= section().htmlEqualTo('<section></section>')

testTitle ::= title(content="mytitle", attributes=["a","b"]).htmlEqualTo('<title a b>mytitle</title>')
testTitleDefaults ::= title().htmlEqualTo('<title></title>')

testScript ::= script(content="content", attributes=["a","b"]).htmlEqualTo('<script a b>content</script>')
testScriptDefaults ::= script().htmlEqualTo('<script></script>')

testMain ::= main(content="content", attributes=["a","b"]).htmlEqualTo('<main a b>content</main>')
testMainDefaults ::= main().htmlEqualTo('<main></main>')

testSection ::= section(content="content", attributes=["a","b"]).htmlEqualTo('<section a b>content</section>')
testSectionDefaults ::= section().htmlEqualTo('<section></section>')

testH1 ::= h1(content="content", attributes=["a","b"]).htmlEqualTo('<h1 a b>content</h1>')
testH1Defaults ::= h1().htmlEqualTo('<h1></h1>')

testH2 ::= h2(content="content", attributes=["a","b"]).htmlEqualTo('<h2 a b>content</h2>')
testH2Defaults ::= h2().htmlEqualTo('<h2></h2>')

testH3 ::= h3(content="content", attributes=["a","b"]).htmlEqualTo('<h3 a b>content</h3>')
testH3Defaults ::= h3().htmlEqualTo('<h3></h3>')

testH4 ::= h4(content="content", attributes=["a","b"]).htmlEqualTo('<h4 a b>content</h4>')
testH4Defaults ::= h4().htmlEqualTo('<h4></h4>')

testH5 ::= h5(content="content", attributes=["a","b"]).htmlEqualTo('<h5 a b>content</h5>')
testH5Defaults ::= h5().htmlEqualTo('<h5></h5>')

testH6 ::= h6(content="content", attributes=["a","b"]).htmlEqualTo('<h6 a b>content</h6>')
testH6Defaults ::= h6().htmlEqualTo('<h6></h6>')

testP ::= p(content="content", attributes=["a","b"]).htmlEqualTo('<p a b>content</p>')
testPDefaults ::= p().htmlEqualTo('<p></p>')

testDiv ::= div(content="content", attributes=["a","b"]).htmlEqualTo('<div a b>content</div>')
testDivDefaults ::= div().htmlEqualTo('<div></div>')

testSpan ::= span(content="content", attributes=["a","b"]).htmlEqualTo('<span a b>content</span>')
testSpanDefaults ::= span().htmlEqualTo('<span></span>')

testButton ::= button(content="content", attributes=["a","b"]).htmlEqualTo('<button a b>content</button>')
testButtonDefaults ::= button().htmlEqualTo('<button></button>')

testA ::= a(content="content", attributes=["a","b"]).htmlEqualTo('<a a b>content</a>')
testADefaults ::= a().htmlEqualTo('<a></a>')

testUl ::= ul(content="content", attributes=["a","b"]).htmlEqualTo('<ul a b>content</ul>')
testUlDefaults ::= ul().htmlEqualTo('<ul></ul>')

testOl ::= ol(content="content", attributes=["a","b"]).htmlEqualTo('<ol a b>content</ol>')
testOlDefaults ::= ol().htmlEqualTo('<ol></ol>')

testLi ::= li(content="content", attributes=["a","b"]).htmlEqualTo('<li a b>content</li>')
testLiDefaults ::= li().htmlEqualTo('<li></li>')

testStrong ::= strong(content="content", attributes=["a","b"]).htmlEqualTo('<strong a b>content</strong>')
testStrongDefaults ::= strong().htmlEqualTo('<strong></strong>')

testEm ::= em(content="content", attributes=["a","b"]).htmlEqualTo('<em a b>content</em>')
testEmDefaults ::= em().htmlEqualTo('<em></em>')

testSmall ::= small(content="content", attributes=["a","b"]).htmlEqualTo('<small a b>content</small>')
testSmallDefaults ::= small().htmlEqualTo('<small></small>')

testCode ::= code(content="content", attributes=["a","b"]).htmlEqualTo('<code a b>content</code>')
testCodeDefaults ::= code().htmlEqualTo('<code></code>')

testPre ::= pre(content="content", attributes=["a","b"]).htmlEqualTo('<pre a b>content</pre>')
testPreDefaults ::= pre().htmlEqualTo('<pre></pre>')

testImg ::= img(content="content", attributes=["a","b"]).htmlEqualTo('<img a b>content</img>')
testImgDefaults ::= img().htmlEqualTo('<img></img>')

testTable ::= table(content="content", attributes=["a","b"]).htmlEqualTo('<table a b>content</table>')
testTableDefaults ::= table().htmlEqualTo('<table></table>')

testThead ::= thead(content="content", attributes=["a","b"]).htmlEqualTo('<thead a b>content</thead>')
testTheadDefaults ::= thead().htmlEqualTo('<thead></thead>')

testTbody ::= tbody(content="content", attributes=["a","b"]).htmlEqualTo('<tbody a b>content</tbody>')
testTbodyDefaults ::= tbody().htmlEqualTo('<tbody></tbody>')

testTr ::= tr(content="content", attributes=["a","b"]).htmlEqualTo('<tr a b>content</tr>')
testTrDefaults ::= tr().htmlEqualTo('<tr></tr>')

testTh ::= th(content="content", attributes=["a","b"]).htmlEqualTo('<th a b>content</th>')
testThDefaults ::= th().htmlEqualTo('<th></th>')

testTd ::= td(content="content", attributes=["a","b"]).htmlEqualTo('<td a b>content</td>')
testTdDefaults ::= td().htmlEqualTo('<td></td>')

testMeta ::= meta(attributes=["a","b"]).htmlEqualTo('<meta a b/>')
testMetaDefaults ::= meta().htmlEqualTo('<meta/>')

testLink ::= link(attributes=["a","b"]).htmlEqualTo('<link a b/>')
testLinkDefaults ::= link().htmlEqualTo('<link/>')

testBase ::= base(attributes=["a","b"]).htmlEqualTo('<base a b/>')
testBase ::= base().htmlEqualTo('<base/>')