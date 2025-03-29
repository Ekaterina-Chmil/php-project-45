#!/usr/bin/env php
<?php

namespace BrainGames\Games;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateRound(): array
{
    $number = rand(1, 100);
    return [$number, isEven($number) ? 'yes' : 'no'];
}

function runBrainEvenGame()
{
    runGame(DESCRIPTION, fn() => generateRound());
}
