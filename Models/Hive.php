<?php


namespace Models;


class Hive
{
    protected $bees = [];

    protected $isAlive;


    public function addBee(Bee $bee){

        $this->bees[] = $bee;
    }


    public function hitRandomBee(){

        /** @var Bee $randomBee */
        $randomBee = $this->bees[mt_rand(0, count($this->bees))];

        $randomBee->hit();
    }


}