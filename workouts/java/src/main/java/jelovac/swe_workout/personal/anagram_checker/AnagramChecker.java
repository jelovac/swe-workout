package jelovac.swe_workout.personal.anagram_checker;

import static java.util.Arrays.sort;

/**
 * Definition: Anagram is a word or phrase formed by rearranging the letters of different word or
 * phrase using all the original letters exactly once.
 */
public class AnagramChecker {
  public boolean isAnagram(String subjectInput, String anagramInput) {

    // Remove all spaces and special characters from both inputs
    // and make them lowercase
    subjectInput = this.sanitizeInput(subjectInput);
    anagramInput = this.sanitizeInput(anagramInput);

    // Compare inputs if they are same lengths
    int subjectLength = subjectInput.length();
    int anagramLength = anagramInput.length();

    if (subjectLength != anagramLength || subjectLength == 1) {
      return false;
    }

    // Check if the inputs are equal
    if (subjectInput.equals(anagramInput)) {
      return false;
    }

    // Check if anagram input uses only subject's letters and the letters are used exactly once
    char[] subjectCharArray = subjectInput.toCharArray();
    sort(subjectCharArray);

    char[] anagramCharArray = anagramInput.toCharArray();
    sort(anagramCharArray);

    for (int i = 0; i < subjectCharArray.length; i++) {
      if (subjectCharArray[i] != anagramCharArray[i]) {
        return false;
      }
    }

    return true;
  }

  private String sanitizeInput(String input) {

    // Remove special characters
    String output = input.replaceAll("[^a-zA-Z0-9]", "");

    // make string lowercase
    output = output.toLowerCase();

    return output;
  }
}
