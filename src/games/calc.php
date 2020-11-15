<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\run;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS = ['+', '-', '*'];
const MAX_RANDOM_VALUE = 99;

function calculate($num1, $num2, $operation)
{
    switch ($operation) {
        case '+':
            $currentAnswer = $num1 + $num2;
            break;
        case '-':
            $currentAnswer = $num1 - $num2;
            break;
        case '*':
            $currentAnswer = $num1 * $num2;
            break;
    }
    return $currentAnswer;
}

function runCalc()
{
    $getCalcData = function () {
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $num1 = mt_rand(1, MAX_RANDOM_VALUE);
        $num2 = mt_rand(1, MAX_RANDOM_VALUE);
        $question = "$num1 $operation $num2";
        $currentAnswer = strval(calculate($num1, $num2, $operation));
        
        $gameData = [];
        $gameData['currentAnswer'] = $currentAnswer;
        $gameData['question'] = $question;
        return $gameData;
    };
    run($getCalcData, DESCRIPTION);
}
