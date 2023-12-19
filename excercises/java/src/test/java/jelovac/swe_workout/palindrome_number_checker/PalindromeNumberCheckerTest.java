package jelovac.swe_workout.palindrome_number_checker;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.stream.Stream;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

public class PalindromeNumberCheckerTest {
  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testAlgorithmAlfa(int number, boolean expected) {
    PalindromeNumberChecker palindromeNumberChecker = new PalindromeNumberChecker();

    boolean algorithmAlfaResult = palindromeNumberChecker.checkUsingAlgorithmAlfa(number);

    assertEquals(expected, algorithmAlfaResult);
  }

  @ParameterizedTest
  @MethodSource("testDataProvider")
  public void testAlgorithmBeta(int number, boolean expected) {
    PalindromeNumberChecker palindromeNumberChecker = new PalindromeNumberChecker();

    boolean algorithmBetaResult = palindromeNumberChecker.checkUsingAlgorithmBeta(number);

    assertEquals(expected, algorithmBetaResult);
  }

  private static Stream<Arguments> testDataProvider() {
    return Stream.of(
        Arguments.of(121, true),
        Arguments.of(-121, false),
        Arguments.of(12, false),
        Arguments.of(1, true));
  }
}
