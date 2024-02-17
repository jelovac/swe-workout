package jelovac.swe_workout.lc.problem20;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class Solution20Test {

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testSolution20(String s, boolean expected) {
    Solution20 solution20 = new Solution20();

    boolean result = solution20.isValid(s);

    assertEquals(expected, result);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of("()", true),
        Arguments.of("()[]{}", true),
        Arguments.of("{[()]}", true),
        Arguments.of("(]", false));
  }
}
