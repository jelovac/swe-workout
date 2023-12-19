package jelovac.swe_workout.palindrome_number_checker;

import java.util.ArrayList;

public class PalindromeNumberChecker {
  public boolean checkUsingAlgorithmAlfa(int number) {
    if (number < 0) {
      // Negative numbers cannot be palindrome
      return false;
    }

    if (number > 0 && number < 10) {
      // Single digit numbers are always a palindrome
      return true;
    }

    String numberAsString = String.valueOf(number);

    int numberAsStringLength = numberAsString.length();

    int leftCursor = 0;
    int rightCursor = numberAsStringLength - 1;

    while (leftCursor < rightCursor) {
      if (numberAsString.charAt(leftCursor) != numberAsString.codePointAt(rightCursor)) {
        return false;
      }

      leftCursor++;
      rightCursor--;
    }

    return true;
  }

  public boolean checkUsingAlgorithmBeta(int number) {
    if (number < 0) {
      // Negative numbers cannot be palindrome
      return false;
    }

    if (number > 0 && number < 10) {
      // Single digit numbers are always a palindrome
      return true;
    }

    ArrayList<Integer> orderedDigitsArrayList = new ArrayList<>();

    while (number > 0) {
      int digit = (number % 10);
      orderedDigitsArrayList.add(digit);
      number = number / 10;
    }

    int numberAsStringLength = orderedDigitsArrayList.size();

    int leftCursor = 0;
    int rightCursor = numberAsStringLength - 1;

    while (leftCursor < rightCursor) {
      if (!orderedDigitsArrayList.get(leftCursor).equals(orderedDigitsArrayList.get(rightCursor))) {
        return false;
      }

      leftCursor++;
      rightCursor--;
    }

    return true;
  }
}
