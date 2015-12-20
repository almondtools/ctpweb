import com.almondtools.ctpweb.htmlattributes.*

testAtt ::= att(key="key", value="value").htmlEqualTo('key="value"')

testAttNoValue ::= att(key="key", value="").htmlEqualTo('')

testForceAtt ::= force(att(key="key", value="")).htmlEqualTo('key=""')

testId ::= aId("value").htmlEqualTo('id="value"')

testName ::= aName("value").htmlEqualTo('name="value"')

testClass ::= aClass("value").htmlEqualTo('class="value"')

testRole ::= aRole("value").htmlEqualTo('role="value"')

testContent ::= aContent("value").htmlEqualTo('content="value"')

testCharset ::= aCharset("value").htmlEqualTo('charset="value"')

testType ::= aType("value").htmlEqualTo('type="value"')

testRel ::= aRel("value").htmlEqualTo('rel="value"')

testHref ::= aHref("value").htmlEqualTo('href="value"')

testSrc ::= aSrc("value").htmlEqualTo('src="value"')
