att(key="", value="") ::= {<<if(cond=any([not(value.empty()),@force?:false]),then={<<key>>="<<value>>"})>>}

force(attribute, force=true) ::= attribute

aXmlns(value="") ::= att(key="xmlns",value=value)