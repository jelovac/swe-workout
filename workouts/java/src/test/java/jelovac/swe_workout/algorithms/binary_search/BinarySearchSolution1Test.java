package jelovac.swe_workout.algorithms.binary_search;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class BinarySearchSolution1Test {

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testBinarySearchSolution1(int target, int[] sortedArray, int expected) {
    BinarySearchSolution1 binarySearchSolution1 = new BinarySearchSolution1();

    int actual = binarySearchSolution1.search(target, sortedArray);

    assertEquals(expected, actual);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of(0, new int[] {1, 2, 3, 4}, -1),
        Arguments.of(5, new int[] {1, 2, 3, 4}, -1),
        Arguments.of(4, new int[] {}, -1),
        Arguments.of(1, new int[] {1, 2, 3, 4}, 0),
        Arguments.of(4, new int[] {1, 2, 3, 4}, 3),
        Arguments.of(-11, new int[] {-13, -11, 2, 3, 4}, 1));
  }
}
