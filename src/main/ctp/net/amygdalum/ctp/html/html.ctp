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

main(content="", attributes=[]) ::= {
  <main<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </main>
}

section(content="", attributes=[]) ::= {
  <section<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </section>
}

h1(content="", attributes=[]) ::= {
  <h1<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h1>
}.trim()

h2(content="", attributes=[]) ::= {
  <h2<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h2>
}.trim()

h3(content="", attributes=[]) ::= {
  <h3<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h3>
}.trim()

h4(content="", attributes=[]) ::= {
  <h4<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h4>
}.trim()

h5(content="", attributes=[]) ::= {
  <h5<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h5>
}.trim()

h6(content="", attributes=[]) ::= {
  <h6<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></h6>
}.trim()

p(content="", attributes=[]) ::= {
  <p<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></p>
}.trim()

span(content="", attributes=[]) ::= {
  <span<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></span>
}.trim()

div(content="", attributes=[]) ::= {
  <div<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </div>
}.trim()

a(content="", attributes=[]) ::= {
  <a<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </a>
}.trim()

button(content="", attributes=[]) ::= {
  <button<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </button>
}.trim()

img(content="", attributes=[]) ::= {
  <img<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </img>
}.trim()

ul(content="", attributes=[]) ::= {
  <ul<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </ul>
}.trim()

ol(content="", attributes=[]) ::= {
  <ol<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>>
    <<content>>
  </ol>
}.trim()

li(content="", attributes=[]) ::= {
  <li<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></li>
}.trim()

strong(content="", attributes=[]) ::= {
  <strong<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></strong>
}.trim()

em(content="", attributes=[]) ::= {
  <em<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></em>
}.trim()

small(content="", attributes=[]) ::= {
  <small<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></small>
}.trim()

code(content="", attributes=[]) ::= {
  <code<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></code>
}.trim()

pre(content="", attributes=[]) ::= {
  <pre<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content.trim>></pre>
}.trim()

table(content="", attributes=[]) ::= {
  <table<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></table>
}.trim()

thead(content="", attributes=[]) ::= {
  <thead<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></thead>
}.trim()

tbody(content="", attributes=[]) ::= {
  <tbody<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></tbody>
}.trim()

tr(content="", attributes=[]) ::= {
  <tr<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></tr>
}.trim()

th(content="", attributes=[]) ::= {
  <th<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></th>
}.trim()

td(content="", attributes=[]) ::= {
  <td<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></td>
}.trim()

sup(content="", attributes=[]) ::= {
  <sup<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></sup>
}.trim()

sub(content="", attributes=[]) ::= {
  <sub<<for(att=attributes.mergeHtmlAttributes,do={ <<@att>>})>>><<content>></sub>
}.trim()
