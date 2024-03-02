<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Codility\SmallestPossibleIntegerFinder;

use PHPUnit\Framework\TestCase;

final class SmallestMissingPositiveIntegerInSequenceFinderTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     *
     * @param array<int> $nums
     */
    public function testSolution(array $nums, int $expectedResult): void
    {
        $solution = new SmallestMissingPositiveIntegerInSequenceFinder();

        $actualResult = $solution->solution($nums);

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @return array<mixed>
     */
    public static function provideTestData(): array
    {
        return [
            [
                'nums' => [1, 3, 6, 4, 1, 2],
                'expectedResult' => 5,
            ],
            [
                'nums' => [-1, 2, 3, 6, 4, 1, 2, -1],
                'expectedResult' => 5,
            ],
            [
                'nums' => [-1, 2, 3, 6, 4, 1, 2, -1, -3],
                'expectedResult' => 5,
            ],
        ];
    }
}
