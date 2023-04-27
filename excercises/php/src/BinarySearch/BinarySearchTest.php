<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\BinarySearch;

use PHPUnit\Framework\TestCase;

final class BinarySearchTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     *
     * @param array<mixed> $nums
     */
    public function test(array $nums, int $target, int $expected): void
    {
        $binarySearch = new BinarySearch();

        $targetIndex = $binarySearch->search($nums, $target);

        $this->assertEquals($expected, $targetIndex);
    }

    /**
     * @return array<mixed>
     */
    public function provideTestData(): array
    {
        return [
          [
            'nums' => [-1, 0, 3, 5, 9, 12],
            'target' => 9,
            'expected' => 4,
          ],
          [
            'nums' => [-1, 0, 3, 5, 9, 12],
            'target' => 2,
            'expected' => -1,
          ],
          [
            'nums' => [-1, 0, 3, 5, 9, 12],
            'target' => -1,
            'expected' => 0,
          ],
          [
            'nums' => [-1, 0, 3, 5, 9, 12],
            'target' => 12,
            'expected' => 5,
          ],
          [
            'nums' => [],
            'target' => 9,
            'expected' => -1,
          ],
          [
            'nums' => [4],
            'target' => 9,
            'expected' => -1,
          ],
        ];
    }
}
