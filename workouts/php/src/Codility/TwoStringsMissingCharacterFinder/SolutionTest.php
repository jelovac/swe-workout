<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Codility\TwoStringsMissingCharacterFinder;

use PHPUnit\Framework\TestCase;

final class SolutionTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function testSolution(string $S, string $T, string $expectedResult): void
    {
        $solution = new Solution();

        $actualResult = $solution->solution($S, $T);

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @return array<mixed>
     */
    public static function provideTestData(): array
    {
        return [
            [
                'S' => 'test',
                'T' => 'test',
                'expectedResult' => 'EQUAL',
            ],
            [
                'S' => 'gain',
                'T' => 'again',
                'expectedResult' => 'INSERT a',
            ],
            [
                'S' => 'parks',
                'T' => 'park',
                'expectedResult' => 'REMOVE s',
            ],
            [
                'S' => 'form',
                'T' => 'from',
                'expectedResult' => 'SWAP o r',
            ],
            [
                'S' => 'o',
                'T' => 'odd',
                'expectedResult' => 'IMPOSSIBLE',
            ],
            [
                'S' => 'fift',
                'T' => 'fifth',
                'expectedResult' => 'IMPOSSIBLE',
            ],
        ];
    }
}
