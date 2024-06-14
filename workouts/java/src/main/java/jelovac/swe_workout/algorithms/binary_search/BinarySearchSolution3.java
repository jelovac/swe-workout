package jelovac.swe_workout.algorithms.binary_search;

public class BinarySearchSolution3 {
  public int search(int targetValue, int[] sortedArray) {
    return this.recursiveBinarySearch(targetValue, sortedArray, 0);
  }

  public int recursiveBinarySearch(
      int targetValue, int[] sortedArray, int carrySearchWindowStartIndex) {

    if (sortedArray.length == 0) {
      return -1;
    }

    int searchWindowStartIndex = 0;
    int searchWindowEndIndex = sortedArray.length - 1;

    int searchWindowMiddleIndex = (searchWindowStartIndex + searchWindowEndIndex) / 2;
    int searchWindowMiddleValue = sortedArray[searchWindowMiddleIndex];

    if (targetValue == searchWindowMiddleValue) {
      return searchWindowMiddleIndex + carrySearchWindowStartIndex;
    }

    int searchWindowFirstValue = sortedArray[searchWindowStartIndex];
    int searchWindowLastValue = sortedArray[searchWindowEndIndex];

    if (targetValue < searchWindowMiddleValue && targetValue >= searchWindowFirstValue) {
      int firstHalfSize = searchWindowMiddleIndex;

      int[] firstHalf = new int[firstHalfSize];

      for (int i = 0; i < searchWindowMiddleIndex; i++) {
        firstHalf[i] = sortedArray[i];
      }

      return this.recursiveBinarySearch(targetValue, firstHalf, carrySearchWindowStartIndex);
    } else if (targetValue > searchWindowMiddleValue && targetValue <= searchWindowLastValue) {
      int secondHalfSize = searchWindowEndIndex - searchWindowMiddleIndex;
      int[] secondHalf = new int[secondHalfSize];

      for (int i = searchWindowMiddleIndex + 1, z = 0; i < sortedArray.length; i++, z++) {
        secondHalf[z] = sortedArray[i];
      }

      return this.recursiveBinarySearch(
          targetValue, secondHalf, carrySearchWindowStartIndex + (searchWindowMiddleIndex + 1));
    }

    return -1;
  }
}
