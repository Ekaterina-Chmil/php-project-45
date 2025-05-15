<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}

function startGame(): void
{
    $generateGameData = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $correctAnswer = gcd($num1, $num2);

        $question = "{$num1} {$num2}";
        return [$question, (string) $correctAnswer];
    };

    runGame(GAME_DESCRIPTION, $generateGameData);
}

