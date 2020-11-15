<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run($getGameData, $description)
{
    line('Welcome to the Brain Game!');
    line($description);
    $gameData = $getGameData();
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = $gameData['question'];
        $currentAnswer = $gameData['currentAnswer'];
        $userAnswer = prompt("Question: {$question}");
        if ($userAnswer !== $currentAnswer) {
            line("'%s' is wrong answer ;(.", $userAnswer);
            line("Correct answer was '%s'.Let's try again, %s!", $currentAnswer, $name);
            exit;
        } else {
            line("Correct!");
        }
        $gameData = $getGameData();
    }
    line("Congratulations, %s", $name);
}
