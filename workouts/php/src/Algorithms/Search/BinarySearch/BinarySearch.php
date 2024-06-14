<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Algorithms\Search\BinarySearch;

final class BinarySearch
{
    /**
     * @param int[] $nums   array of integer numbers which is sorted in ascending order
     * @param int   $target target value to search for in the provided array
     *
     * @return int Returns target value index in the provided array. If value does not exist returns -1.
     */
    public function search(array $nums, int $target): int
    {
        $numsLength = count($nums);

        if (0 === $numsLength) {
            return -1;
        }

        if (1 === $numsLength) {
            if ($target === end($nums)) {
                $targetIndex = key($nums);

                if (!is_int($targetIndex)) {
                    throw new \UnexpectedValueException('The value should be an integer!');
                }

                return $targetIndex;
            }

            return -1;
        }

        $splitLength = (int) floor($numsLength / 2);

        $leftSplit = array_slice($nums, 0, $splitLength, true);
        $rightSplit = array_slice($nums, $splitLength, $numsLength - $splitLength, true);

        $leftSplitLength = count($leftSplit);
        $lastElementValueInLeftSplit = end($leftSplit);

        if ($lastElementValueInLeftSplit === $target) {
            $lastElementIndexInLeftSplit = key($leftSplit);

            if (!is_int($lastElementIndexInLeftSplit)) {
                throw new \UnexpectedValueException('The value should be an integer!');
            }

            return $lastElementIndexInLeftSplit;
        }

        if ($target < $lastElementValueInLeftSplit) {
            if (1 === $leftSplitLength) {
                return -1;
            }

            return $this->search($leftSplit, $target);
        }

        return $this->search($rightSplit, $target);
    }
}
