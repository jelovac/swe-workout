<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\LengthOfLongestSubstring;

final class LengthOfLongestSubstringCalculator
{
    public function calculate(string $input): int
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
}
