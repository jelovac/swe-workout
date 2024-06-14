<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Personal\TwoSortedArraysMedian;

final class TwoSortedArraysMedianCalculator
{
    /**
     * @param int[] $arr1
     * @param int[] $arr2
     */
    public function calculate(array $arr1, array $arr2): float
    {
        // Merge
        $mergedArr = array_merge($arr1, $arr2);

        // Sort
        sort($mergedArr, SORT_NUMERIC);

        // Count
        $mergedArrCount = count($mergedArr);

        // Split
        if (0 !== $mergedArrCount % 2) {
            $median = array_slice($mergedArr, (int) floor($mergedArrCount / 2))[0];
        } else {
            $index = $mergedArrCount / 2 - 1;
            $median = ($mergedArr[$index] + $mergedArr[$index + 1]) / 2;
        }

        return $median;
    }
}
