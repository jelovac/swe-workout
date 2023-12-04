<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\TwoSortedArraysMedian;

use PHPUnit\Framework\TestCase;

final class TwoSortedArraysMedianCalculatorTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     *
     * @param int[] $arr1
     * @param int[] $arr2
     */
    public function test(array $arr1, array $arr2, float $expectedResult): void
    {
        $calculator = new TwoSortedArraysMedianCalculator();

        $result = $calculator->calculate($arr1, $arr2);

        $this->assertEquals($expectedResult, $result);
    }

    public static function provideTestData(): array
    {
        return [
            [
                'arr1' => [1],
                'arr2' => [2],
                'expectedResult' => 1.5,
            ],
            [
                'arr1' => [0],
                'arr2' => [0],
                'expectedResult' => 0,
            ],
            [
                'arr1' => [0, 1, 2, 3],
                'arr2' => [5],
                'expectedResult' => 2,
            ],
            [
                'arr1' => [1, 3],
                'arr2' => [2, 7],
                'expectedResult' => 2.5,
            ],
            [
                'arr1' => [1, 3],
                'arr2' => [2],
                'expectedResult' => 2,
            ],
        ];
    }
}
