package jelovac.swe_workout.lc.problem347;

import static org.junit.jupiter.api.Assertions.assertArrayEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class Solution347Test {

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testSolution347(int[] nums, int k, int[] expected) {
    Solution347 solution347 = new Solution347();

    int[] result = solution347.topKFrequent(nums, k);

    assertArrayEquals(expected, result);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of(new int[] {1, 1, 1, 2, 2, 3}, 2, new int[] {1, 2}),
        Arguments.of(new int[] {1, 2}, 2, new int[] {1, 2}),
        Arguments.of(new int[] {3}, 1, new int[] {3}));
  }
}
