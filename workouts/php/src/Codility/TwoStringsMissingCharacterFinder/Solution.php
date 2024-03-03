<?php

declare(strict_types=1);

namespace Jelovac\SweWorkout\Codility\TwoStringsMissingCharacterFinder;

final class Solution
{
    public function solution(string $S, string $T): string
    {
        $sAsCharArray = str_split($S, 1);
        $tAsCharArray = str_split($T, 1);

        if ($sAsCharArray === $tAsCharArray) {
            return 'EQUAL';
        }

        $t1 = $tAsCharArray;
        $firstCharacter = array_shift($t1);
        if ($sAsCharArray === $t1) {
            return sprintf(
                'INSERT %s',
                $firstCharacter,
            );
        }

        $t2 = $sAsCharArray;
        $lastCharacter = array_pop($t2);
        if ($tAsCharArray === $t2) {
            return sprintf(
                'REMOVE %s',
                $lastCharacter,
            );
        }

        for ($i = 0; $i < (count($sAsCharArray) - 1); ++$i) {
            $temp = $sAsCharArray;

            $currentChar = $temp[$i];
            $nextChar = $temp[$i + 1];

            $temp[$i] = $nextChar;
            $temp[$i + 1] = $currentChar;

            if ($temp === $tAsCharArray) {
                return sprintf(
                    'SWAP %s %s',
                    $currentChar,
                    $nextChar,
                );
            }
        }

        return 'IMPOSSIBLE';
    }
}
