package jelovac.swe_workout.personal.longest_common_prefix_finder;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class LongestCommonPrefixFinderTest {

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testAlgorithmAlfa(String[] words, String expected) {
    LongestCommonPrefixFinder longestCommonPrefixFinder = new LongestCommonPrefixFinder();

    String algorithmAlfaResult = longestCommonPrefixFinder.findUsingAlgorithmAlfa(words);

    assertEquals(expected, algorithmAlfaResult);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of(new String[] {"fintech", "finish", "finland"}, "fin"),
        Arguments.of(new String[] {"alexa", "alexey", "albert"}, "al"),
        Arguments.of(new String[] {"abc", "a", "b"}, ""),
        Arguments.of(new String[] {"a"}, "a"),
        Arguments.of(new String[] {"apple", "apricot", "antarctic"}, "a"));
  }
}
