import com.almondtools.common.datatypes.*


testDate ::= date(2007,2,2).format("dd.MM.yyyy").equalTo("02.02.2007")
testGermanDate ::= date(2007,3,2).format("MMM", "de").equalTo("Mär")
testEnglishDate ::= date(2007,3,2).format("MMM", "en").equalTo("Mar")

testTime ::= time(6,22,4).format("HH:mm:ss").equalTo("06:22:04")

testDatetime ::= datetime(2007,2,2,6,22,4,111).format("yyyy-MM-dd'T'HH:mm:ss.SSS").equalTo("2007-02-02T06:22:04.111")
testGermanDatetime ::= datetime(2007,10,2,6,22,4,111).format("MMMMM","de").equalTo("Oktober")
testEnglishDatetime ::= datetime(2007,10,2,6,22,4,111).format("MMMMM","en").equalTo("October")

