<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Codility\RobotMovesMakeARectangle;

use PHPUnit\Framework\TestCase;

final class SolutionTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function testSolution(string $moves, bool $expectedResult): void
    {
        $solution = new Solution();

        $actualResult = $solution->solution($moves);

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @return array<mixed>
     */
    public static function provideTestData(): array
    {
        return [
            [
                'moves' => '^^^<<<<vvv>>>>',
                'expectedResult' => true,
            ],
            [
                'moves' => '<vvv>>^^^<',
                'expectedResult' => true,
            ],
            [
                'moves' => '<^^^>v',
                'expectedResult' => false,
            ],
            [
                'moves' => '<^<vv>>^',
                'expectedResult' => false,
            ],
        ];
    }
}
