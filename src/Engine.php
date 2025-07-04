<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(\Closure $getGameData, string $gameDescription): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($gameDescription);

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $getGameData();

        line("Question: {$question}");
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, {$userName}!");
}

