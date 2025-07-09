<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function calculate(int $num1, int $num2, string $operation): int
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
	default:
            throw new \Exception("Unexpected operation: $operation");
    }
}

function generateData(): array
{
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operation = OPERATIONS[array_rand(OPERATIONS)];

    $correctAnswer = calculate($num1, $num2, $operation);
    $question = "{$num1} {$operation} {$num2}";

    return [
        'question' => $question,
        'correctAnswer' => (string) $correctAnswer,
    ];
}

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}
