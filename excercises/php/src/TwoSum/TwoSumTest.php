<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\TwoSum;

use PHPUnit\Framework\TestCase;

final class TwoSumTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     *
     * @param array<mixed> $nums
     * @param array<mixed> $expectedResult
     *
     * @throws \Exception
     */
    public function testSimple(array $nums, int $target, array $expectedResult): void
    {
        $twoSum = new TwoSum();

        $result = $twoSum->solution($nums, $target, TwoSumAlgorithmComplexity::simple);

        $this->assertTrue($expectedResult[0] === $result[0]);
        $this->assertTrue($expectedResult[1] === $result[1]);
        $this->assertCount(2, $result);
    }

    /**
     * @dataProvider provideTestData
     *
     * @param array<mixed> $nums
     * @param array<mixed> $expectedResult
     *
     * @throws \Exception
     */
    public function testAdvanced(array $nums, int $target, array $expectedResult): void
    {
        $twoSum = new TwoSum();

        $result = $twoSum->solution($nums, $target, TwoSumAlgorithmComplexity::advanced);

        $this->assertTrue($expectedResult[0] === $result[0]);
        $this->assertTrue($expectedResult[1] === $result[1]);
        $this->assertCount(2, $result);
    }

    /**
     * @return array<mixed>
     */
    public static function provideTestData(): array
    {
        return [
            [
                'nums' => [-10, 1, 11, 15],
                'target' => -9,
                'expectedResult' => [0, 1],
            ],
            [
                'nums' => [50, -1, 20],
                'target' => 19,
                'expectedResult' => [1, 2],
            ],
            [
                'nums' => [24, 24],
                'target' => 48,
                'expectedResult' => [0, 1],
            ],
        ];
    }
}
