<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\AddTwoNumbers;

final class AddTwoNumbers
{
    use LinkedListTrait;

    /**
     * Sum two non-empty linked lists which represent positive integers.
     *
     * Constraints:
     * - both lists represent only positive integers
     * - both lists contain at least one digit
     * - the digits of each list are stored in reverse order
     * - there are no leading zeroes in the list
     */
    public function solution(ListNode $listOne, ListNode $listTwo): ListNode
    {
        $currentNodeForListOne = $listOne;
        $currentNodeForListTwo = $listTwo;

        $intArrayResult = [];

        $carry = false;

        do {
            $sum =
                ($currentNodeForListOne->val ?? 0)
                + ($currentNodeForListTwo->val ?? 0)
                + ($carry ? 1 : 0);

            if ($sum > 9) {
                $sum = (int) str_split("$sum")[1];
                $carry = true;
            } else {
                $carry = false;
            }

            $intArrayResult[] = $sum;

            $currentNodeForListOne = $currentNodeForListOne?->next;
            $currentNodeForListTwo = $currentNodeForListTwo?->next;
        } while (
            null !== $currentNodeForListOne
            || null !== $currentNodeForListTwo
        );

        if ($carry) {
            $intArrayResult[] = 1;
        }

        return self::convertIntArrayToLinkedList($intArrayResult);
    }
}
