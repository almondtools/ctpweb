import net.amygdalum.ctp.xml.xml.*

testXml ::= xml(version="0.8.15", encoding="UTF-8").equalTo('<?xml version="0.8.15" encoding="UTF-8"?>')
testXmlDefaults ::= xml().equalTo('<?xml version="" encoding=""?>')

testUrlset ::= urlset(content="content", attributes=["a","b"]).xmlEqualTo('<urlset a b>content</urlset>')
testUrlsetDefaults ::= urlset().xmlEqualTo('<urlset></urlset>')

testUrl ::= url(content="content", attributes=["a","b"]).xmlEqualTo('<url a b>content</url>')
testUrlDefaults ::= url().xmlEqualTo('<url></url>')

testLoc ::= loc(content="content", attributes=["a","b"]).xmlEqualTo('<loc a b>content</loc>')
testLocDefaults ::= loc().xmlEqualTo('<loc></loc>')