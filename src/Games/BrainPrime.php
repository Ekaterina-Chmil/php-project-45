<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function generateRound(): array
{
    $number = rand(2, 100);
    $correctAnswer = isPrime($number) ? 'yes' : 'no';
    return ["$number", $correctAnswer];
}

function startGame(): void
{
    runGame(DESCRIPTION, fn() => generateRound());
}

