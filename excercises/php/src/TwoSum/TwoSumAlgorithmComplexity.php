<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\TwoSum;

enum TwoSumAlgorithmComplexity: string
{
    case simple = 'O(n^2)';
    case advanced = 'O(n)';
}
