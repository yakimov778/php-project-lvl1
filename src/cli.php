<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run($getGameData, $description)
{
    line('Welcome to the Brain Game!');
    line($description);
    $gameData = $getGameData();
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
}//end run()
