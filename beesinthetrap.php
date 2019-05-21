<?php

include 'Models/Bee.php';
include 'Models/Hive.php';
include 'Models/QueenBee.php';

use Models\Bee;
use Models\Hive;
use Models\QueenBee;


$hive = new Hive();


for ($workerBees = 0; $workerBees < 5; $workerBees++) {

    $workerBee = new Bee(Bee::BEE_TYPE_WORKER, 75, 10);
    $hive->addBee($workerBee);
}

for ($droneBees = 0; $droneBees < 8; $droneBees++) {

    $droneBee = new Bee(Bee::BEE_TYPE_DRONE, 50, 12);
    $hive->addBee($droneBee);

}

$queenBee = new QueenBee(Bee::BEE_TYPE_QUEEN, 100, 8);
$hive->addBee($queenBee);


// Start the game!
$resSTDIN = fopen("php://stdin", "r");

echo("\n\n\nWelcome to the bee game. Your objective is to destroy the hive. Please type 'hit' and hit return.");
$strChar = stream_get_contents($resSTDIN, 3);

echo("\nYou typed: " . $strChar . "\n\n");
fclose($resSTDIN);