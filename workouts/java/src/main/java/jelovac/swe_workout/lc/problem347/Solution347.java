package jelovac.swe_workout.lc.problem347;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.HashMap;

/**
 * Problem: <a href="https://leetcode.com/problems/top-k-frequent-elements/description/">Top K
 * Frequent Elements</a>
 */
public class Solution347 {
  public int[] topKFrequent(int[] nums, int k) {
    HashMap<Integer, Integer> numToCountMap = new HashMap<>();
    HashMap<Integer, ArrayList<Integer>> countToNumMap = new HashMap<>();

    for (int num : nums) {
      int count = numToCountMap.getOrDefault(num, 0) + 1;
      numToCountMap.put(num, count);
    }

    numToCountMap.forEach(
        (Integer numValue, Integer numCount) -> {
          ArrayList<Integer> matchedCountValues =
              countToNumMap.getOrDefault(numCount, new ArrayList<>());
          matchedCountValues.add(numValue);
          countToNumMap.put(numCount, matchedCountValues);
        });

    ArrayList<Integer> numCountList = new ArrayList<>(numToCountMap.values());
    numCountList.sort(Comparator.reverseOrder());

    ArrayList<Integer> resultValues = new ArrayList<>();

    for (int i = 0; i < k; ) {
      int topKMapIndex = numCountList.get(i);
      ArrayList<Integer> matchedCountValues = countToNumMap.get(topKMapIndex);
      resultValues.addAll(matchedCountValues);
      i = i + matchedCountValues.size();
    }

    return resultValues.stream().mapToInt(i -> i).toArray();
  }
}
