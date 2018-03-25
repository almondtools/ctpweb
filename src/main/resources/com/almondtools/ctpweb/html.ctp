doctype(type="html") ::= {<!DOCTYPE <<type>>>}

html(content="", attributes=[]) ::= {
  <html<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </html>
}

head(content="", attributes=[]) ::= {
  <head<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </head>
}

body(content="", attributes=[]) ::= {
  <body<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </body>
}

meta(attributes=[]) ::= {
  <meta<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>/>
}

title(content="", attributes=[]) ::= {
  <title<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></title>
}

link(attributes=[]) ::= {
  <link<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>/>
}

base(attributes=[]) ::= {
  <base<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>/>
}

script(content="", attributes=[]) ::= {
  <script<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></script>
}

nav(content="", attributes=[]) ::= {
  <nav<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </nav>
}

header(content="", attributes=[]) ::= {
  <header<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </header>
}

footer(content="", attributes=[]) ::= {
  <footer<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </footer>
}

section(content="", attributes=[]) ::= {
  <section<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </section>
}

h1(content="", attributes=[]) ::= {
  <h1<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h1>
}

h2(content="", attributes=[]) ::= {
  <h2<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h2>
}

h3(content="", attributes=[]) ::= {
  <h3<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h3>
}

h4(content="", attributes=[]) ::= {
  <h4<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h4>
}

h5(content="", attributes=[]) ::= {
  <h5<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h5>
}

h6(content="", attributes=[]) ::= {
  <h6<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h6>
}

p(content="", attributes=[]) ::= {
  <p<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></p>
}

span(content="", attributes=[]) ::= {
  <span<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></span>
}

div(content="", attributes=[]) ::= {
  <div<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </div>
}

a(content="", attributes=[]) ::= {
  <a<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </a>
}

button(content="", attributes=[]) ::= {
  <button<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </button>
}

ul(content="", attributes=[]) ::= {
  <ul<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </ul>
}

ol(content="", attributes=[]) ::= {
  <ol<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </ol>
}

li(content="", attributes=[]) ::= {
  <li<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></li>
}

strong(content="", attributes=[]) ::= {
  <strong<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></strong>
}

em(content="", attributes=[]) ::= {
  <em<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></em>
}

small(content="", attributes=[]) ::= {
  <small<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></small>
}

code(content="", attributes=[]) ::= {
  <code<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></code>
}

pre(content="", attributes=[]) ::= {
  <pre<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content.trim>></pre>
}

