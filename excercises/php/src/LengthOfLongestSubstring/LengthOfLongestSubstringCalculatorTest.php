<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\LengthOfLongestSubstring;

use PHPUnit\Framework\TestCase;

final class LengthOfLongestSubstringCalculatorTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function testUsingBruteForceAlgorithm(string $input, int $expectedResult): void
    {
        $calculator = new LengthOfLongestSubstringCalculator();

        $length = $calculator->bruteForceAlgorithm($input);

        $this->assertEquals($expectedResult, $length);
    }

    /**
     * @dataProvider provideTestData
     */
    public function testUsingOptimizedBruteForceAlgorithm(string $input, int $expectedResult): void
    {
        $calculator = new LengthOfLongestSubstringCalculator();

        $length = $calculator->bruteForceOptimizedAlgorithm($input);

        $this->assertEquals($expectedResult, $length);
    }

    /**
     * @dataProvider provideTestData
     */
    public function testUsingSlidingWindowAlgorithm(string $input, int $expectedResult): void
    {
        $calculator = new LengthOfLongestSubstringCalculator();

        $length = $calculator->slidingWindowAlgorithm($input);

        $this->assertEquals($expectedResult, $length);
    }

    /**
     * @return array<mixed>
     */
    public static function provideTestData(): array
    {
        return [
            [
                'input' => 'asdasdaa',
                'expectedResult' => 3,
            ],
            [
                'input' => 'xxxxxxxx',
                'expectedResult' => 1,
            ],
            [
                'input' => 'zadwz',
                'expectedResult' => 4,
            ],
            [
                'input' => 'zadwz',
                'expectedResult' => 4,
            ],
            [
                'input' => '',
                'expectedResult' => 0,
            ],
            [
                'input' => 'aab',
                'expectedResult' => 2,
            ],
            [
                'input' => 'abbcda',
                'expectedResult' => 4,
            ],
            [
                'input' => 'qwertyqwerty',
                'expectedResult' => 6,
            ],
        ];
    }
}
