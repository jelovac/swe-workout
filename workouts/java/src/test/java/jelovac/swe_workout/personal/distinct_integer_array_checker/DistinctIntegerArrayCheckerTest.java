package jelovac.swe_workout.personal.distinct_integer_array_checker;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class DistinctIntegerArrayCheckerTest {

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testCheckIsDistinctUsingSortingApproach(int[] values, boolean expected) {
    DistinctIntegerArrayChecker distinctIntegerArrayChecker = new DistinctIntegerArrayChecker();

    boolean actual = distinctIntegerArrayChecker.checkIsDistinctUsingSortingApproach(values);

    assertEquals(expected, actual);
  }

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testCheckIsDistinctUsingSecondaryListApproach(int[] values, boolean expected) {
    DistinctIntegerArrayChecker distinctIntegerArrayChecker = new DistinctIntegerArrayChecker();

    boolean actual = distinctIntegerArrayChecker.checkIsDistinctUsingSecondaryListApproach(values);

    assertEquals(expected, actual);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of(new int[] {1, 2, 3, 1}, false),
        Arguments.of(new int[] {1}, true),
        Arguments.of(new int[] {}, true),
        Arguments.of(new int[] {1, 1}, false),
        Arguments.of(new int[] {-1, 1, 0}, true),
        Arguments.of(new int[] {-1, 0, 1, -1}, false));
  }
}
