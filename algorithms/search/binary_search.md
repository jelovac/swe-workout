# Binary Search Algorithm

Binary search is a divide and conquer search algorithm used for finding an element's position in a sorted array.

It only works on sorted arrays, and its efficiency comes from reducing the search space by half at each step.

It has time complexity: O(log n) which makes it very efficient for searching large datasets.

## High-level explanation:

1. Start the search from the middle of a sorted array

   Find the middle element in the array.

   If array has even numbered of elements, in other words there is no middle element, then chose either one of the two
   elements in the middle.

   Let's name this element probing element (probe).

2. Compare the search target value with the probing element

   1. `target == probe`:

      target element has been found;

      return its index position;

   2. `target < probe`:

      target element is less than probe;

      search can be concentrated on the first half of the array;

      repeat the search on that half;

   3. `target > probe`:

      target element is greater than the probe;

      search can be concentrated on the second half of the array;

      repeat the search on that half;

3. Repeat the search process until you find the target element or there are no more elements in the array. If the target value does not exist in the array a good practice is to return an index of value of -1.

## Examples

- [Java](../../workouts/java/src/main/algorithms/binary_search)
