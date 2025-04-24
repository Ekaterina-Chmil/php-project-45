#!/usr/bin/env php
<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function startGame(): void
{
    $generateGameData = function () {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $operation = OPERATIONS[array_rand(OPERATIONS)];

        switch ($operation) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
            default:
                throw new \Exception("Unexpected operation: $operation");
        }

        $question = "{$num1} {$operation} {$num2}";
        return [$question, (string) $correctAnswer];
    };

    runGame(GAME_DESCRIPTION, $generateGameData);
}

