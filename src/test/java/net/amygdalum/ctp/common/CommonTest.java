package net.amygdalum.ctp.common;

import java.util.stream.Stream;

import org.junit.jupiter.api.DynamicNode;
import org.junit.jupiter.api.TestFactory;
import org.junit.jupiter.api.extension.ExtendWith;

import net.amygdalum.ctp.unit.CtpUnitExtension;
import net.amygdalum.ctp.unit.CtpUnitTestSuite;
import net.amygdalum.ctp.unit.CtpUnitExtension.Spec;

@ExtendWith(CtpUnitExtension.class)
public class CommonTest {

	@Spec(src = "src/test/ctp", modules="net.amygdalum.ctp.common")
	@TestFactory
	public Stream<DynamicNode> tests(CtpUnitTestSuite suite) throws Exception {
		return suite.testsuite();
	}
}
