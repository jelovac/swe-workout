package jelovac.swe_workout.longest_common_prefix_finder;

public class LongestCommonPrefixFinder {
  public String findUsingAlgorithmAlfa(String[] words) {
    if (words.length == 0) {
      throw new RuntimeException("Provided empty String[]!");
    }

    Integer shortestWordLength = null;

    // First we find the shortest word
    for (String word : words) {
      int currentWordLength = word.length();

      if (shortestWordLength == null || currentWordLength < shortestWordLength) {
        shortestWordLength = currentWordLength;
      }
    }

    StringBuilder matched = new StringBuilder();

    outerLoop:
    for (int i = 0; i < shortestWordLength; i++) {

      Character currentLetterMatch = null;

      for (int j = 0; j < words.length; j++) {
        String currentWord = words[j];
        char currentWordIndexLetter = currentWord.charAt(i);

        if (j == 0) {
          currentLetterMatch = currentWordIndexLetter;
          continue;
        }

        if (currentLetterMatch != currentWordIndexLetter) {
          break outerLoop;
        }

        if (j == words.length - 1) {
          matched.append(currentLetterMatch);
        }
      }
    }

    return matched.toString();
  }
}
