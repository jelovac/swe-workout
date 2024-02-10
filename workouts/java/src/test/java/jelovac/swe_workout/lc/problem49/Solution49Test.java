package jelovac.swe_workout.lc.problem49;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.Arrays;
import java.util.List;
import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class Solution49Test {
  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testSolution49(String[] anagrams, List<List<String>> expected) {
    Solution49 solution49 = new Solution49();

    List<List<String>> result = solution49.groupsAnagrams(anagrams);

    // sorting the result to match testData order
    result.sort((o1, o2) -> Integer.compare(o1.size(), o2.size()));

    assertEquals(expected, result);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of(
            new String[] {"eat", "tea", "tan", "ate", "nat", "bat"},
            Arrays.asList(
                List.of("bat"), Arrays.asList("nat", "tan"), Arrays.asList("ate", "eat", "tea"))),
        Arguments.of(new String[] {""}, List.of(List.of(""))),
        Arguments.of(new String[] {"a"}, List.of(List.of("a"))));
  }
}
