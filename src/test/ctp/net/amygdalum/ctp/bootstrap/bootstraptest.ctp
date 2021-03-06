import net.amygdalum.ctp.html.htmlattributes.*
import net.amygdalum.ctp.bootstrap.bootstrap.*


testLinkBootstrapCss ::= linkBootstrapCss(version="a.b.c").htmlEqualTo('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/a.b.c/css/bootstrap.min.css"/>') 

testScriptBootstrapJs ::= scriptBootstrapJs(version="a.b.c").htmlEqualTo('<script src="https://maxcdn.bootstrapcdn.com/bootstrap/a.b.c/js/bootstrap.min.js"></script>')

testNavbar ::= navbar("navbar-content",attributes=["a","b"]).htmlEqualTo('<nav class="navbar" role="navigation" a b>navbar-content</nav>')
testNavbarAdditionalClasses ::= navbar("navbar-content",attributes=[aClass("c")]).htmlEqualTo('<nav class="navbar c" role="navigation">navbar-content</nav>')

testNavbarHeader ::= navbarHeader("navbarheader-content", attributes=["a","b"]).htmlEqualTo('<div class="navbar-header" a b>navbarheader-content</div>')
testNavbarHeaderAdditionalClasses ::= navbarHeader("navbarheader-content", attributes=[aClass("c")]).htmlEqualTo('<div class="navbar-header c">navbarheader-content</div>')

testContainer ::= container("content", attributes=["a","b"]).htmlEqualTo('<div class="container" a b>content</div>')
testContainerAdditionalClasses ::= container("content", attributes=[aClass("c")]).htmlEqualTo('<div class="container c">content</div>')

testCard ::= card("heading", "body", attributes=["a","b"]).htmlEqualTo('<div class="card" a b><div class="card-header">heading</div><div class="card-body">body</div></div>')
testCardAdditionalClasses ::= card("heading", "body", attributes=[aClass("c")]).htmlEqualTo('<div class="card c"><div class="card-header">heading</div><div class="card-body">body</div></div>')

testRow ::= row("content", attributes=["a","b"]).htmlEqualTo('<div class="row" a b>content</div>')
testRowAdditionalClasses ::= row("content", attributes=[aClass("c")]).htmlEqualTo('<div class="row c">content</div>')

testCol ::= col("content", xs="5", sm="4", md="3", lg="2", attributes=["a","b"]).htmlEqualTo('<div class="col-xs-5 col-sm-4 col-md-3 col-lg-2" a b>content</div>')
testColXs ::= col("content", xs="5").htmlEqualTo('<div class="col-xs-5">content</div>')
testColSm ::= col("content", sm="4").htmlEqualTo('<div class="col-sm-4">content</div>')
testColMd ::= col("content", md="3").htmlEqualTo('<div class="col-md-3">content</div>')
testColLg ::= col("content", lg="2").htmlEqualTo('<div class="col-lg-2">content</div>')
testColAdditionalClasses ::= col("content", xs="5", sm="4", md="3", lg="2", attributes=[aClass("c")]).htmlEqualTo('<div class="c col-xs-5 col-sm-4 col-md-3 col-lg-2">content</div>')

testColClass ::= colClass(xs="9", sm="8", md="7", lg="6").htmlEqualTo('col-xs-9 col-sm-8 col-md-7 col-lg-6')
testColClassXs ::= colClass(xs="9").htmlEqualTo('col-xs-9')
testColClassSm ::= colClass(sm="8").htmlEqualTo('col-sm-8')
testColClassMd ::= colClass(md="7").htmlEqualTo('col-md-7')
testColClassLg ::= colClass(lg="6").htmlEqualTo('col-lg-6')

testAlert ::= alert("content",attributes=["a","b"]).htmlEqualTo('<div class="alert" role="alert" a b>content</div>')
testAlertAdditionalClasses ::= alert("content",attributes=[aClass("c")]).htmlEqualTo('<div class="alert c" role="alert">content</div>')

testInfo ::= info("content",attributes=["a","b"]).htmlEqualTo('<div class="alert alert-info" role="alert" a b>content</div>')
testInfoAdditionalClasses ::= info("content",attributes=[aClass("c")]).htmlEqualTo('<div class="alert alert-info c" role="alert">content</div>')

testWarning ::= warning("content",attributes=["a","b"]).htmlEqualTo('<div class="alert alert-warning" role="alert" a b>content</div>')
testWarningAdditionalClasses ::= warning("content",attributes=[aClass("c")]).htmlEqualTo('<div class="alert alert-warning c" role="alert">content</div>')

testSuccess ::= success("content",attributes=["a","b"]).htmlEqualTo('<div class="alert alert-success" role="alert" a b>content</div>')
testSuccessAdditionalClasses ::= success("content",attributes=[aClass("c")]).htmlEqualTo('<div class="alert alert-success c" role="alert">content</div>')

testDanger ::= danger("content",attributes=["a","b"]).htmlEqualTo('<div class="alert alert-danger" role="alert" a b>content</div>')
testDangerAdditionalClasses ::= danger("content",attributes=[aClass("c")]).htmlEqualTo('<div class="alert alert-danger c" role="alert">content</div>')