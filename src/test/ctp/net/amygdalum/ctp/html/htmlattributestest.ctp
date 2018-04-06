import net.amygdalum.ctp.html.htmlattributes.*

testAtt ::= att(key="key", value="value").htmlEqualTo('key="value"')
testAttDefaults ::= att().htmlEqualTo('')

testForceAtt ::= force(att(key="key", value="")).htmlEqualTo('key=""')

testId ::= aId("value").htmlEqualTo('id="value"')
testIdDefaults ::= aId().htmlEqualTo('')

testName ::= aName("value").htmlEqualTo('name="value"')
testNameDefaults ::= aName().htmlEqualTo('')

testClass ::= aClass("value").htmlEqualTo('class="value"')
testClassDefaults ::= aClass().htmlEqualTo('')

testRole ::= aRole("value").htmlEqualTo('role="value"')
testRole ::= aRole().htmlEqualTo('')

testContent ::= aContent("value").htmlEqualTo('content="value"')
testContentDefaults ::= aContent().htmlEqualTo('')

testCharset ::= aCharset("value").htmlEqualTo('charset="value"')
testCharsetDefaults ::= aCharset().htmlEqualTo('')

testType ::= aType("value").htmlEqualTo('type="value"')
testTypeDefaults ::= aType().htmlEqualTo('')

testRel ::= aRel("value").htmlEqualTo('rel="value"')
testRelDefaults ::= aRel().htmlEqualTo('')

testHref ::= aHref("value").htmlEqualTo('href="value"')
testHrefDefaults ::= aHref().htmlEqualTo('')

testSrc ::= aSrc("value").htmlEqualTo('src="value"')
testSrcDefaults ::= aSrc().htmlEqualTo('')

testHttpEquiv ::= aHttpEquiv("value").htmlEqualTo('http-equiv="value"')
testHttpEquivDefaults ::= aHttpEquiv().htmlEqualTo('')

testHreflang ::= aHreflang("value").htmlEqualTo('hreflang="value"')
testHreflangDefaults ::= aHreflang().htmlEqualTo('')

testLang ::= aLang("value").htmlEqualTo('lang="value"')
testLangDefaults ::= aLang().htmlEqualTo('')
