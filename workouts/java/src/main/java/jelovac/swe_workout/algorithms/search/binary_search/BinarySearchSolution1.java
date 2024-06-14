package jelovac.swe_workout.algorithms.search.binary_search;

public class BinarySearchSolution1 {
  int search(int targetValue, int[] sortedArray) {

    int searchWindowStartIndex = 0;
    int searchWindowEndIndex = sortedArray.length - 1;

    while (searchWindowStartIndex <= searchWindowEndIndex) {

      int searchWindowMiddleIndex = (searchWindowStartIndex + searchWindowEndIndex) / 2;
      int searchWindowMiddleValue = sortedArray[searchWindowMiddleIndex];

      if (targetValue == searchWindowMiddleValue) {
        return searchWindowMiddleIndex;
      } else if (targetValue < searchWindowMiddleValue) {
        searchWindowEndIndex = searchWindowMiddleIndex - 1;
      } else {
        searchWindowStartIndex = searchWindowMiddleIndex + 1;
      }
    }

    return -1;
  }
}
