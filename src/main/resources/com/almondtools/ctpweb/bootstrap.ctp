import com.almondtools.ctpweb.html.*
import com.almondtools.ctpweb.htmlattributes.*

linkBootstrapCss(version="") ::= link(attributes=[aRel("stylesheet"),aHref({https://maxcdn.bootstrapcdn.com/bootstrap/<<version>>/css/bootstrap.min.css})]) 

scriptBootstrapJs(version="") ::= script(attributes=[aSrc({https://maxcdn.bootstrapcdn.com/bootstrap/<<version>>/js/bootstrap.min.js})])

navbar(content="", attributes=[]) ::= {
  	<<nav(content, attributes=[aClass("navbar"), aRole("navigation")]~attributes)>>
}

navbarfixed(content="", attributes=[]) ::= {
    <<nav(content, attributes=[aClass("navbar fixed-top"), aRole("navigation")]~attributes)>>
    <<div("", attributes=[aClass("navbar-placeholder")])>>
}

navbarHeader(content="", attributes=[]) ::= div(content, aClass("navbar-header")~attributes)

pageHeader(content="", attributes=[]) ::= div(content, aClass("page-header")~attributes)

container(content="", attributes=[]) ::= div(content, aClass("container")~attributes)

card(heading="", body="", attributes=[]) ::= {
	<<div({
		<<div(heading, attributes=[aClass("card-header")])>>
		<<div(body, attributes=[aClass("card-body")])>>
	}, attributes=aClass("card")~attributes)>>
}

jumbotron(content, attributes=[]) ::= {
	<<div(content, attributes=aClass("jumbotron")~attributes)>>
}

row(content="", attributes=[]) ::= div(content, aClass("row")~attributes)

col(content="", xs="", sm="", md="", lg="", attributes=[]) ::= div(content, attributes~aClass(colClass(xs,sm,md,lg)))

colClass(xs="", sm="", md="", lg="") ::= {
	<<if(xs.empty,"",{col-xs-<<xs>>})>>
	<<if(sm.empty,"",{col-sm-<<sm>>})>>
	<<if(md.empty,"",{col-md-<<md>>})>>
	<<if(lg.empty,"",{col-lg-<<lg>>})>>
}.trim.compress

pushClass(xs="", sm="", md="", lg="") ::= {
	<<if(xs.empty,"",{col-xs-push-<<xs>>})>>
	<<if(sm.empty,"",{col-sm-push-<<sm>>})>>
	<<if(md.empty,"",{col-md-push-<<md>>})>>
	<<if(lg.empty,"",{col-lg-push-<<lg>>})>>
}.trim.compress

pullClass(xs="", sm="", md="", lg="") ::= {
	<<if(xs.empty,"",{col-xs-pull-<<xs>>})>>
	<<if(sm.empty,"",{col-sm-pull-<<sm>>})>>
	<<if(md.empty,"",{col-md-pull-<<md>>})>>
	<<if(lg.empty,"",{col-lg-pull-<<lg>>})>>
}.trim.compress

alert(content="", attributes=[]) ::= div(content, aClass("alert")~aRole("alert")~attributes)

info(content="", attributes=[]) ::= alert(content, aClass("alert-info")~attributes)

warning(content="", attributes=[]) ::= alert(content, aClass("alert-warning")~attributes)

success(content="", attributes=[]) ::= alert(content, aClass("alert-success")~attributes)

danger(content="", attributes=[]) ::= alert(content, aClass("alert-danger")~attributes)