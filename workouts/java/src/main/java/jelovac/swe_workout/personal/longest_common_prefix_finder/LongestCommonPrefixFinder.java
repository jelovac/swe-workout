package jelovac.swe_workout.personal.longest_common_prefix_finder;

public class LongestCommonPrefixFinder {
  public String findUsingAlgorithmAlfa(String[] words) {
    if (words.length == 1) {
      return words[0];
    }

    String shortestWord = this.getShortestWordFromArrayOUnsortedWords(words);

    StringBuilder matched = new StringBuilder();

    outerLoop:
    for (int i = 0; i < shortestWord.length(); i++) {

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

  private String getShortestWordFromArrayOUnsortedWords(String[] words) throws RuntimeException {
    if (words.length == 0) {
      throw new RuntimeException("Provided empty String[]!");
    }

    String shortestWord = null;

    for (String word : words) {
      if (shortestWord == null || word.length() < shortestWord.length()) {
        shortestWord = word;
      }
    }

    return shortestWord;
  }
}
