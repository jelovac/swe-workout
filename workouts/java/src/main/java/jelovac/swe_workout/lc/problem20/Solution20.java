package jelovac.swe_workout.lc.problem20;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Stack;

/**
 * Problem <a href="https://leetcode.com/problems/valid-parentheses/description/">20. Valid
 * Parentheses</a>
 */
public class Solution20 {
  public boolean isValid(String s) {

    int inputLength = s.length();

    boolean isEven = (inputLength % 2) == 0;
    if (!isEven) {
      return false;
    }

    Stack<Character> stack = new Stack<>();

    HashMap<Character, Character> bracketsMap = new HashMap<>();
    bracketsMap.put('(', ')');
    bracketsMap.put('[', ']');
    bracketsMap.put('{', '}');

    ArrayList<Character> openingBracketsList = new ArrayList<>();
    openingBracketsList.add('(');
    openingBracketsList.add('[');
    openingBracketsList.add('{');

    for (int i = 0; i < s.length(); i++) {
      char currentValue = s.charAt(i);

      if (stack.empty()) {
        if (openingBracketsList.contains(currentValue)) {
          stack.push(currentValue);
          continue;
        } else {
          return false;
        }
      }

      char previousValue = stack.peek();

      if (openingBracketsList.contains(previousValue)) {
        if (openingBracketsList.contains(currentValue)) {
          stack.push(currentValue);
          continue;
        } else {
          if (currentValue == bracketsMap.get(previousValue)) {
            stack.pop();
            continue;
          } else {
            return false;
          }
        }
      }

      char expectedValue = bracketsMap.get(previousValue);
      if (expectedValue == currentValue) {
        stack.pop();
      } else {
        return false;
      }
    }

    return stack.empty();
  }
}
