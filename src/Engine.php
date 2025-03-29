#!/usr/bin/env php
<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greet;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $description, callable $generateRound)
{
    $name = prompt('May I have your name?');
    echo "Hello, $name!" . PHP_EOL;
    echo $description . PHP_EOL;

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $generateRound();
        echo "Question: $question" . PHP_EOL;

        $userAnswer = strtolower(trim(prompt('Your answer')));

        if ($userAnswer !== $correctAnswer) {
            echo "'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'." . PHP_EOL;
            echo "Let's try again, $name!" . PHP_EOL;
            return;
        }

        echo "Correct!" . PHP_EOL;
    }

    echo "Congratulations, $name!" . PHP_EOL;
}

