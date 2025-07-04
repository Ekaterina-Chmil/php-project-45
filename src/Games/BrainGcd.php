<?php

declare(strict_types=1);

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGreatestCommonDivisor(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}

function generateGameData(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $question = "{$number1} {$number2}";
    $correctAnswer = (string) getGreatestCommonDivisor($number1, $number2);

    return [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ];
}
function run(): void
{
    runGame(fn() => generateGameData(), GAME_DESCRIPTION);
}
