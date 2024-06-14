<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Personal\AddTwoNumbers;

use PHPUnit\Framework\TestCase;

final class AddTwoNumbersTest extends TestCase
{
    use LinkedListTrait;

    /**
     * @dataProvider provideTestData
     */
    public function test(ListNode $listOne, ListNode $listTwo, ListNode $expectedResult): void
    {
        $addTwoNumbers = new AddTwoNumbers();

        $result = $addTwoNumbers->solution(
            $listOne,
            $listTwo,
        );

        $this->assertTrue(
            $expectedResult == $result
        );
    }

    /**
     * @return array<mixed>
     */
    public static function provideTestData(): array
    {
        $data = [
            [
                'listOne' => [1, 1, 1],
                'listTwo' => [1, 3, 2],
                'expectedResult' => [2, 4, 3],
            ],
            [
                'listOne' => [0],
                'listTwo' => [0],
                'expectedResult' => [0],
            ],
            [
                'listOne' => [0, 2, 3],
                'listTwo' => [1, 2, 3],
                'expectedResult' => [1, 4, 6],
            ],
            [
                'listOne' => [5, 3, 1],
                'listTwo' => [1, 2],
                'expectedResult' => [6, 5, 1],
            ],
            [
                'listOne' => [5, 9, 9],
                'listTwo' => [5],
                'expectedResult' => [0, 0, 0, 1],
            ],
            [
                'listOne' => [7, 7, 7, 7],
                'listTwo' => [4, 4],
                'expectedResult' => [1, 2, 8, 7],
            ],
        ];

        foreach ($data as &$testCase) {
            $testCase['listOne'] = self::convertIntArrayToLinkedList($testCase['listOne']);
            $testCase['listTwo'] = self::convertIntArrayToLinkedList($testCase['listTwo']);
            $testCase['expectedResult'] = self::convertIntArrayToLinkedList($testCase['expectedResult']);
        }

        return $data;
    }
}
