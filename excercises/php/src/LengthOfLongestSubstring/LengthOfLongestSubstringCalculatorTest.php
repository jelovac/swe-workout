<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\LengthOfLongestSubstring;

use PHPUnit\Framework\TestCase;

final class LengthOfLongestSubstringCalculatorTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function test(string $input, int $expectedResult): void
    {
        $calculator = new LengthOfLongestSubstringCalculator();

        $length = $calculator->calculate($input);

        $this->assertEquals($expectedResult, $length);
    }

    /**
     * @dataProvider provideTestData
     */
    public function testOptimized(string $input, int $expectedResult): void
    {
        $calculator = new OptimizedLengthOfLongestSubstringCalculator();

        $length = $calculator->calculate($input);

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
