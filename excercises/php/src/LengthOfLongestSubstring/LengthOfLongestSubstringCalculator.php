<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\LengthOfLongestSubstring;

final class LengthOfLongestSubstringCalculator
{
    public function bruteForceAlgorithm(string $input): int
    {
        $charArray = mb_str_split($input);
        $charArrayCount = count($charArray);
        $longestSubstringCharArrayCount = 0;

        for ($i = 0; $i < $charArrayCount; ++$i) {
            $substringCharArray = [$charArray[$i]];

            for ($j = $i + 1; $j < $charArrayCount; ++$j) {
                if (in_array($charArray[$j], $substringCharArray)) {
                    break;
                }

                $substringCharArray[$j] = $charArray[$j];
            }

            $substringCharArrayCount = count($substringCharArray);
            if ($substringCharArrayCount > $longestSubstringCharArrayCount) {
                $longestSubstringCharArrayCount = $substringCharArrayCount;
            }
        }

        return $longestSubstringCharArrayCount;
    }

    public function bruteForceOptimizedAlgorithm(string $input): int
    {
        $charArray = mb_str_split($input);
        $charArrayCount = count($charArray);
        $longestSubstringCharArrayCount = 0;

        for ($i = 0; $i < $charArrayCount; ++$i) {
            $substringCharArray = [$charArray[$i]];
            $substringCharArrayUniqueValues = [$charArray[$i] => $charArray[$i]];

            for ($j = $i + 1; $j < $charArrayCount; ++$j) {
                if (isset($substringCharArrayUniqueValues[$charArray[$j]])) {
                    break;
                }

                $substringCharArray[$j] = $charArray[$j];
                $substringCharArrayUniqueValues[$charArray[$j]] = $charArray[$j];
            }

            $substringCharArrayCount = count($substringCharArray);
            if ($substringCharArrayCount > $longestSubstringCharArrayCount) {
                $longestSubstringCharArrayCount = $substringCharArrayCount;
            }
        }

        return $longestSubstringCharArrayCount;
    }

    public function slidingWindowAlgorithm(string $input): int
    {
        $charArray = mb_str_split($input);
        $charArrayCount = count($charArray);

        $longestSubstringLength = 0;

        $charToIndexMap = [];

        for ($i = 0, $windowStartIndex = $i; $i < $charArrayCount; ++$i) {
            $char = $charArray[$i];

            if (
                isset($charToIndexMap[$char])
                && ($charToIndexMap[$char] + 1) > $windowStartIndex
            ) {
                $windowStartIndex = $charToIndexMap[$char] + 1;
            }

            $charToIndexMap[$char] = $i;

            $currentWindowLength = $i - $windowStartIndex + 1;

            if ($currentWindowLength > $longestSubstringLength) {
                $longestSubstringLength = $currentWindowLength;
            }
        }

        return $longestSubstringLength;
    }
}
