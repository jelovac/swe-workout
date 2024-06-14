package jelovac.swe_workout.algorithms.search.binary_search;

public class BinarySearchSolution2 {
  public int search(int targetValue, int[] sortedArray) {
    return this.recursiveBinarySearch(targetValue, sortedArray, 0, sortedArray.length - 1);
  }

  private int recursiveBinarySearch(
      int targetValue, int[] sortedArray, int searchWindowStartIndex, int searchWindowEndIndex) {
    if (sortedArray.length == 0) {
      return -1;
    }

    int searchWindowMiddleIndex = (searchWindowStartIndex + searchWindowEndIndex) / 2;
    int searchWindowMiddleValue = sortedArray[searchWindowMiddleIndex];

    if (targetValue < sortedArray[searchWindowStartIndex]
        || targetValue > sortedArray[searchWindowEndIndex]) {
      return -1;
    } else if (targetValue == searchWindowMiddleValue) {
      return searchWindowMiddleIndex;
    } else if (targetValue < searchWindowMiddleValue) {
      return this.recursiveBinarySearch(
          targetValue, sortedArray, searchWindowStartIndex, searchWindowMiddleIndex - 1);
    } else {
      return this.recursiveBinarySearch(
          targetValue, sortedArray, searchWindowMiddleIndex + 1, searchWindowEndIndex);
    }
  }
}
