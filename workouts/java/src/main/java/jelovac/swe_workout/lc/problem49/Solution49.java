package jelovac.swe_workout.lc.problem49;

import static java.util.Arrays.sort;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

/**
 * Problem: <a href="https://leetcode.com/problems/group-anagrams/description/">Group Anagrams</a>
 */
public class Solution49 {
  public List<List<String>> groupsAnagrams(String[] strs) {

    sort(strs);

    HashMap<String, ArrayList<String>> groupedHashmap = new HashMap<>();

    for (String str : strs) {
      char[] chars = str.toCharArray();
      sort(chars);
      String key = String.valueOf(chars);

      if (groupedHashmap.containsKey(key)) {
        ArrayList<String> existingList = groupedHashmap.get(key);
        existingList.add(str);
      } else {
        ArrayList<String> newList = new ArrayList<>();
        newList.add(str);
        groupedHashmap.put(key, newList);
      }
    }

    return new ArrayList<>(groupedHashmap.values());
  }
}
