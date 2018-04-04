xml(version="", encoding="") ::= {
<?xml version="<<version>>" encoding="<<encoding>>"?>
}

url(content="", attributes=[]) ::= {
  <url<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></url>
}

urlset(content="", attributes=[]) ::= {
  <urlset<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></urlset>
}

loc(content="", attributes=[]) ::= {
  <loc<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></loc>
}
