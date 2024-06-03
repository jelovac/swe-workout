# Binary Search Algorithm

Binary search is a divide and conquer search algorithm used for finding an element's position in a sorted array.

It only works on sorted arrays, and its efficiency comes from reducing the search space by half at each step.

It has time complexity: O(log n) which makes it very eficient for searching large datasets.

High-level explanation:

1. Start your search from the Middle

    Split an array in half. Make the last element of the first half (also called left half) your probing value.

2. Compare the target value with the probing value:

    If they are equal -> you've found your element's position.

    if the probing value is less then the target value -> the element is located in the second half (also called right half) of the array.

    If the probing value is greater then the target value -> the element is located in the first half of the array.

3. Repeat the process

    Repeat the process with the appropriate half of the array (either first or second depending on the previous step). Treat this subset of the array as if it was the whole array and go back to step 1.

4. End

     If the array has no elements (i.e., when the high index is less than the low index), then the target is not in the array, and the search ends.
