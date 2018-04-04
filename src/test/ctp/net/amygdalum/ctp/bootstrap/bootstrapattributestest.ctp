import net.amygdalum.ctp.bootstrap.bootstrapattributes.*

testDataToggle ::= aDataToggle("value").htmlEqualTo('data-toggle="value"')
testDataToggleDefaults ::= aDataToggle().htmlEqualTo('')

testDataTarget ::= aDataTarget("value").htmlEqualTo('data-target="value"')
testDataTargetDefaults ::= aDataTarget().htmlEqualTo('')

testDataLang ::= aDataLang("value").htmlEqualTo('data-lang="value"')
testDataLangDefaults ::= aDataLang().htmlEqualTo('')
