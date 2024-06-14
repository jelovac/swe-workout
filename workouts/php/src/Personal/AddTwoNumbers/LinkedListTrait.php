<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Personal\AddTwoNumbers;

trait LinkedListTrait
{
    /**
     * @param int[] $integers
     *
     * @throws \InvalidArgumentException
     */
    protected static function convertIntArrayToLinkedList(array $integers): ListNode
    {
        foreach (array_reverse($integers) as $integer) {
            $node = new ListNode($integer, $node ?? null);
        }

        if (!isset($node)) {
            throw new \InvalidArgumentException('Array cannot be empty!');
        }

        return $node;
    }
}
