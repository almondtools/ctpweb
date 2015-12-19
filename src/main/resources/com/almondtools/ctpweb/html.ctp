html(content="", attributes=[]) ::= {
  <html`for(att=attributes,do={ `@att`})`>
    `content`
  </html>
}

head(content="", attributes=[]) ::= {
  <head`for(att=attributes,do={ `@att`})`>
    `content`
  </head>
}

body(content="", attributes=[]) ::= {
  <body`for(att=attributes,do={ `@att`})`>
    `content`
  </body>
}

h1(content="", attributes=[]) ::= {
  <h1`for(att=attributes,do={ `@att`})`>`content`</h1>
}

h2(content="", attributes=[]) ::= {
  <h2`for(att=attributes,do={ `@att`})`>`content`</h2>
}

h3(content="", attributes=[]) ::= {
  <h3`for(att=attributes,do={ `@att`})`>`content`</h3>
}

h4(content="", attributes=[]) ::= {
  <h4`for(att=attributes,do={ `@att`})`>`content`</h4>
}

h5(content="", attributes=[]) ::= {
  <h5`for(att=attributes,do={ `@att`})`>`content`</h5>
}

h6(content="", attributes=[]) ::= {
  <h6`for(att=attributes,do={ `@att`})`>`content`</h6>
}

p(content="", attributes=[]) ::= {
  <p`for(att=attributes,do={ `@att`})`>`content`</p>
}
