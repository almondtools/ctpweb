import net.amygdalum.ctp.html.html.*
import net.amygdalum.ctp.html.htmlattributes.*

linkHighlightCss(version="") ::= link(attributes=[aRel("stylesheet"),aHref({https://cdnjs.cloudflare.com/ajax/libs/highlight.js/<<version>>/styles/default.min.css})]) 

scriptHighlightJs(version="") ::= script(attributes=[aSrc({https://cdnjs.cloudflare.com/ajax/libs/highlight.js/<<version>>/highlight.min.js})])
