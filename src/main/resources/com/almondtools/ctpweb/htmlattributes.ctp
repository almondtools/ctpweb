att(key="", value="") ::= {`if(cond=any([not(value.empty()),@force?:false]),then={`key`="`value`"})`}

force(attribute, force=true) ::= attribute

aName(value="") ::= att(key="name",value=value)

aId(value="") ::= att(key="id",value=value)

aContent(value="") ::= att(key="content",value=value)

aCharset(value="") ::= att(key="charset",value=value)

aClass(value="") ::= att(key="class",value=value)

aRole(value="") ::= att(key="role",value=value)

aType(value="") ::= att(key="type",value=value)

aRel(value="") ::= att(key="rel",value=value)

aHref(value="") ::= att(key="href",value=value)

aSrc(value="") ::= att(key="src",value=value)