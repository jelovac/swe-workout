package jelovac.swe_workout.lc.problem33;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class Solution33Test {

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testSolution33(int[] nums, int target, int expected) {
    Solution33 solution33 = new Solution33();

    int result = solution33.search(nums, target);

    assertEquals(expected, result);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of(new int[] {4, 5, 6, 7, 0, 1, 2}, 0, 4),
        Arguments.of(new int[] {4, 5, 6, 7, 0, 1, 2}, 3, -1),
        Arguments.of(new int[] {1}, 0, -1),
        Arguments.of(new int[] {3, 5, 1}, 3, 0),
        Arguments.of(new int[] {4, 5, 6, 7, 0, 1, 2}, 1, 5),
        Arguments.of(new int[] {5, 1, 3}, 5, 0));
  }
}
