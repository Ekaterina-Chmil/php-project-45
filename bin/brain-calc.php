#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use BrainGames\Engine;

const ROUNDS_COUNT = 3;

function getGameData(): array
{
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operation = ['+', '-', '*'][rand(0, 2)];

    $question = "{$num1} {$operation} {$num2}";
    $answer = 0;

    switch ($operation) {
        case '+':
            $answer = $num1 + $num2;
            break;
        case '-':
            $answer = $num1 - $num2;
            break;
        case '*':
            $answer = $num1 * $num2;
            break;
    }

    return [
        'question' => $question,
        'answer' => $answer,
    ];
}

$questions = [];
for ($i = 0; $i < ROUNDS_COUNT; $i++) {
    $questions[] = getGameData();
}

Engine::playGame($questions);

