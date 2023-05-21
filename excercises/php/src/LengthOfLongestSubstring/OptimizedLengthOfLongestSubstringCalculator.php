<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\LengthOfLongestSubstring;

final class OptimizedLengthOfLongestSubstringCalculator implements LengthOfLongestSubstringCalculatorInterface
{
    public function calculate(string $input): int
    {
        $charArray = mb_str_split($input);
        $charArrayCount = count($charArray);
        $longestSubstringCharArrayCount = 0;

        for ($i = 0; $i < $charArrayCount; ++$i) {
            $substringCharArray = [$charArray[$i]];
            $substringCharArrayUniqueValues = [$charArray[$i] => $charArray[$i]];

            for ($j = $i + 1; $j < $charArrayCount; ++$j) {
                if ($substringCharArrayUniqueValues[$charArray[$j]]) {
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
}
