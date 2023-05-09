<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\AddTwoNumbers;

final class ListNode
{
    public function __construct(
        public int $val = 0,
        public ?ListNode $next = null,
    ) {
    }
}
