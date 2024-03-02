<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Codility\SmallestPossibleIntegerFinder;

final class SmallestMissingPositiveIntegerInSequenceFinder
{
    public function solution($A)
    {
        sort($A, SORT_NUMERIC);

        $result = false;
        $expectedNextValue = null;

        for ($i = 0; $i < count($A); ++$i) {
            $num = $A[$i];

            $nextNum = $num + 1;

            if (
                null !== $expectedNextValue
                && $expectedNextValue > 0
                && $expectedNextValue < $num
            ) {
                $result = $expectedNextValue;
                break;
            }

            $expectedNextValue = $nextNum;
        }

        return $result;
    }
}
