<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\LengthOfLongestSubstring;

interface LengthOfLongestSubstringCalculatorInterface
{
    public function calculate(string $input): int;
}
