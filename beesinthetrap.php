<?php

include 'Models/Hive.php';

use Models\Hive;

$hive = new Hive();

$hive->fill();


$welcomeMessage = <<<EOT

Welcome to the bee game. Your objective is to destroy the hive.

There are 5 worker bees, 8 drones and 1 queen.

EOT;

$wrongInputMessage = <<<EOT

Sorry, I didn't understand that. Please type 'hit' and hit return.

EOT;

$keepGoingMessage = <<< EOT

Please type 'hit' and hit return.

EOT;

echo $welcomeMessage;
echo $keepGoingMessage;

$hitCount = 0;

while ($hive->isAlive()) {

    // Keep playing!
    $resSTDIN = fopen("php://stdin", "r");

    $strChar = stream_get_contents($resSTDIN, 3);

    echo $strChar;

    if ($strChar == "hit") {
        $hive->hitRandomBee();
        $hitCount++;
        $hive->getStats(); // So we can see what's going on
        echo $keepGoingMessage;

    } else {
        echo $wrongInputMessage;
    }
}

echo "\nSuccess! You destroyed the hive in {$hitCount} tries. Goodbye.";

fclose($resSTDIN);