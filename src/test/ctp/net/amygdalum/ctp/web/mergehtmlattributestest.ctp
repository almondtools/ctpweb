import net.amygdalum.ctp.html.htmlattributes.*

testUniqueAttributes ::= [att(key="key1", value="value1"),att(key="key2", value="value2")].mergeHtmlAttributes
	.equalTo([att(key="key1", value="value1"),att(key="key2", value="value2")])

testMergableAttributes ::= [att(key="key", value="value1"),att(key="key", value="value2")].mergeHtmlAttributes
	.equalTo([att(key="key", value="value1 value2")])

testNoAttributes ::= ["asdf"].mergeHtmlAttributes
	.equalTo(["asdf"])

testMixedAttributes ::= ["asdf", att(key="key", value="value1"),att(key="key", value="value2"), att(key="k", value="v")].mergeHtmlAttributes
	.equalTo([att(key="key", value="value1 value2"), att(key="k", value="v"), "asdf"])
