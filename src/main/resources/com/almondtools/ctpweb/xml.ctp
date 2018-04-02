xml(version="", encoding="") ::= {
<?xml version="<<version>>" encoding="<<encoding>>"?>
}
urlset(content="", attributes=[]) ::= {
  <urlset<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></urlset>
}

url(content="", attributes=[]) ::= {
  <url<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></url>
}

loc(content="", attributes=[]) ::= {
  <loc<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></loc>
}
