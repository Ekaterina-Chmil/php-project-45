<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';

function buildProgression(int $start, int $step, int $length, int $hiddenIndex): array
{
    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = ($i === $hiddenIndex) ? '..' : (string) ($start + $step * $i);
    }

    return $progression;
}

function startGame(): void
{
    $generateRound = function (): array {
        $start = rand(1, 20);
        $step = rand(2, 10);
        $length = rand(5, 10);
        $hiddenIndex = rand(0, $length - 1);

        $progression = buildProgression($start, $step, $length, $hiddenIndex);
        $question = implode(' ', $progression);
        $correctAnswer = (string) ($start + $step * $hiddenIndex);

        return [$question, $correctAnswer];
    };

    runGame(DESCRIPTION, $generateRound);
}

