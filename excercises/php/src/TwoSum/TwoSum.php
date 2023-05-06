<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\TwoSum;

final class TwoSum
{
    /**
     * The TwoSum problem solution.
     *
     * The problem:
     *
     * From provided $nums array return the indices of two numbers which make the $target sum.
     *
     * Constraints:
     * - $nums must contain at least 2 elements
     * - for the specified $target only one valid answer exists
     *
     * @param array<int,int> $nums
     *
     * @return array<int,int> Returns two values which represent index in $nums array
     *
     * @throws \Exception
     */
    public function solution(array $nums, int $target, TwoSumAlgorithmComplexity $algorithm): array
    {
        if (count($nums) < 2) {
            throw new \InvalidArgumentException('At least two numbers need to be provided!');
        }

        return match ($algorithm) {
            TwoSumAlgorithmComplexity::simple => $this->simpleSolution($nums, $target),
            TwoSumAlgorithmComplexity::advanced => $this->advancedSolution($nums, $target),
        };
    }

    /**
     * Simple less optimized solution.
     * Time complexity: O(n^2).
     *
     * @param array<int,int> $nums
     *
     * @return array<int,int>
     *
     * @throws \Exception
     */
    private function simpleSolution(array $nums, int $target): array
    {
        foreach ($nums as $leftSetNumKey => $leftSetNumValue) {
            unset($nums[$leftSetNumKey]);

            foreach ($nums as $rightSetNumKey => $rightSetNumValue) {
                $sum = $leftSetNumValue + $rightSetNumValue;
                if ($sum === $target) {
                    return [$leftSetNumKey, $rightSetNumKey];
                }
            }
        }

        throw new \Exception('Impossible to achieve target sum using the provided numbers!');
    }

    /**
     * Advanced more optimized solution.
     * Time complexity: O(n).
     *
     * @param array<int,int> $nums
     *
     * @return array<int,int>
     *
     * @throws \Exception
     */
    private function advancedSolution(array $nums, int $target): array
    {
        $possibleSecondNumValues = [];

        foreach ($nums as $firstNumKey => $firstNumValue) {
            $possibleSecondNumValue = $target - $firstNumValue;
            $possibleSecondNumValues[$possibleSecondNumValue] = $firstNumKey;
        }

        foreach ($nums as $secondNumKey => $secondNumValue) {
            $firstNumKey = $possibleSecondNumValues[$secondNumValue] ?? null;

            if (
                null !== $firstNumKey
                && $firstNumKey !== $secondNumKey
            ) {
                if ($firstNumKey > $secondNumKey) {
                    return [
                        $secondNumKey,
                        $firstNumKey,
                    ];
                }

                return [
                    $firstNumKey,
                    $secondNumKey,
                ];
            }
        }

        throw new \Exception('Impossible to achieve target sum using the provided numbers!');
    }
}
