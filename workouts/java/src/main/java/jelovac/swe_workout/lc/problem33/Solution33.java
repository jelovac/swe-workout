package jelovac.swe_workout.lc.problem33;

public class Solution33 {

  /**
   * Problem <a href="https://leetcode.com/problems/search-in-rotated-sorted-array/description/">33.
   * Search in Rotated Sorted Array</a>
   */
  public int search(int[] nums, int target) {

    int searchRangeStartIndex = 0;
    int searchRangeEndIndex = nums.length - 1;

    boolean isProvidedNumsArrayRotated = nums[searchRangeStartIndex] > nums[searchRangeEndIndex];

    while (searchRangeStartIndex <= searchRangeEndIndex) {

      int searchRangeMiddleIndex = (searchRangeStartIndex + searchRangeEndIndex) / 2;
      int searchRangeMiddleValue = nums[searchRangeMiddleIndex];

      if (target == searchRangeMiddleValue) {
        return searchRangeMiddleIndex;
      }

      if (isProvidedNumsArrayRotated) {
        if (target == nums[searchRangeStartIndex]) {
          return searchRangeStartIndex;
        }

        if (target == nums[searchRangeEndIndex]) {
          return searchRangeEndIndex;
        }

        if (searchRangeMiddleIndex == searchRangeEndIndex) {
          break;
        }

        if (target >= nums[searchRangeStartIndex] && target < nums[searchRangeMiddleIndex]) {
          searchRangeEndIndex = searchRangeMiddleIndex - 1;
        } else {
          searchRangeStartIndex = searchRangeStartIndex + 1;
        }
      } else {
        if (target < searchRangeMiddleValue) {
          searchRangeEndIndex = searchRangeMiddleIndex - 1;
        } else {
          searchRangeStartIndex = searchRangeStartIndex + 1;
        }
      }
    }

    return -1;
  }
}
