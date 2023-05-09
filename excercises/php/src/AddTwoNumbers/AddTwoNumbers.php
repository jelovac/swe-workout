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

        $moveIt = false;

        do {
            $lm = $moveIt ? 1 : 0;
            $l1 = $currentNodeForListOne->val ?? 0;
            $l2 = $currentNodeForListTwo->val ?? 0;

            $sum = $lm + $l1 + $l2;

            if ($sum > 9) {
                $sum = (int) str_split("$sum")[1];
                $moveIt = true;
            } else {
                $moveIt = false;
            }

            $intArrayResult[] = $sum;

            $currentNodeForListOne = $currentNodeForListOne?->next;
            $currentNodeForListTwo = $currentNodeForListTwo?->next;
        } while (
            null !== $currentNodeForListOne
            || null !== $currentNodeForListTwo
        );

        if ($moveIt) {
            $intArrayResult[] = 1;
        }

        return self::convertIntArrayToLinkedList($intArrayResult);
    }
}
