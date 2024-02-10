package jelovac.swe_workout.anagram_checker;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class AnagramCheckerTest {
  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testIsAnagram(String subject, String anagram, boolean expected) {
    AnagramChecker anagramChecker = new AnagramChecker();

    boolean actual = anagramChecker.isAnagram(subject, anagram);

    assertEquals(expected, actual);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of("anagram", "nagaram", true),
        Arguments.of("creative", "reactive", true),
        Arguments.of("listen", "silent", true),
        Arguments.of("Paternal", "parental", true),
        Arguments.of("cat", "car", false),
        Arguments.of("c", "c", false),
        Arguments.of("c", "d", false),
        Arguments.of("c", "dc", false),
        Arguments.of("cd", "d", false),
        Arguments.of("Tom Marvolo Riddle", "I am Lord Voldemort", true),
        Arguments.of("A gentleman!", "Elegant man.", true),
        Arguments.of("21!", "12'", true),
        Arguments.of("21", "12", true),
        Arguments.of("00", "00", false),
        Arguments.of("Creative 21", "Reactive 12", true));
  }
}
