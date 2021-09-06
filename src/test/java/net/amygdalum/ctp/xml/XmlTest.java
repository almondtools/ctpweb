package net.amygdalum.ctp.xml;

import java.util.stream.Stream;

import org.junit.jupiter.api.DynamicNode;
import org.junit.jupiter.api.TestFactory;
import org.junit.jupiter.api.extension.ExtendWith;

import net.amygdalum.ctp.unit.CtpUnitExtension;
import net.amygdalum.ctp.unit.CtpUnitExtension.Spec;
import net.amygdalum.ctp.unit.CtpUnitTestSuite;

@ExtendWith(CtpUnitExtension.class)
public class XmlTest {

	@Spec(src = "src/test/ctp", modules = "net.amygdalum.ctp.xml")
	@TestFactory
	public Stream<DynamicNode> tests(CtpUnitTestSuite suite) throws Exception {
		return suite.testsuite();
	}
}
