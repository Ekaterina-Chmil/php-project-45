<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

class Engine
{
    const ROUNDS_COUNT = 3;

    public static function playGame(array $questions)
    {
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, {$name}!");
        line('What is the result of the expression?');

        $round = 1;
        foreach ($questions as $question) {
            line("Question: {$question['question']}");
            $userAnswer = prompt('Your answer:');
            if ((int)$userAnswer === $question['answer']) {
                line('Correct!');
            } else {
                line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$question['answer']}'.");
                line("Let's try again, {$name}!");
                return;
            }

            if ($round === self::ROUNDS_COUNT) {
                line("Congratulations, {$name}!");
                return;
            }

            $round++;
        }
    }
}

