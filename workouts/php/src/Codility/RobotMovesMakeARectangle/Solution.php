<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Codility\RobotMovesMakeARectangle;

final class Solution
{
    public function solution(string $moves): bool
    {
        $movesArr = str_split($moves, 1);

        $executedMovesStack = new \SplStack();
        $executedMovesStack->push([0, 0, null]);

        $executedMoveDirectionUsageCount = [
            '^' => 0,
            'v' => 0,
            '<' => 0,
            '>' => 0,
        ];

        $oppositeMoveMap = [
            '^' => 'v',
            'v' => '^',
            '<' => '>',
            '>' => '<',
        ];

        for ($i = 0; $i < count($movesArr); ++$i) {
            $currentMove = $movesArr[$i];

            $previousMoveCoordinates = $executedMovesStack->top();

            $currentMoveCoordinates = match ($currentMove) {
                '^' => [$previousMoveCoordinates[0], $previousMoveCoordinates[1] + 1, $currentMove],
                'v' => [$previousMoveCoordinates[0], $previousMoveCoordinates[1] - 1, $currentMove],
                '<' => [$previousMoveCoordinates[0] - 1, $previousMoveCoordinates[1], $currentMove],
                '>' => [$previousMoveCoordinates[0] + 1, $previousMoveCoordinates[1], $currentMove],
            };

            if (
                $previousMoveCoordinates[2] !== $currentMove
                && $executedMoveDirectionUsageCount[$currentMove] > 0
                && $executedMoveDirectionUsageCount[$currentMove] !== $executedMoveDirectionUsageCount[$oppositeMoveMap[$currentMove]]
            ) {
                return false;
            }

            $executedMovesStack->push($currentMoveCoordinates);
            $executedMoveDirectionUsageCount[$currentMove] = true;
        }

        $startCoordinates = $executedMovesStack->bottom();
        $endCoordinates = $executedMovesStack->top();

        if (
            $startCoordinates[0] === $endCoordinates[0]
            && $startCoordinates[1] === $endCoordinates[1]
        ) {
            return true;
        }

        return false;
    }
}
