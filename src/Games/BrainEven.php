<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateData(): array
{
    $number = rand(1, 100);
    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return [
        'question' => (string)$number,
        'correctAnswer' => $correctAnswer,
    ];
}

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}
