<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

class Engine
{
    const ROUNDS_COUNT = 3;

    public static function playGame(array $questions, string $description)
    {
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, {$name}!");
	line($description);

        $round = 1;
        foreach ($questions as $question) {
            line("Question: {$question['question']}");
            $userAnswer = prompt('Your answer:');
            if (strtolower($userAnswer) === $question['answer']) {
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

