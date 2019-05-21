<?php

namespace Models;

include 'Bee.php';

/**
 * Class Hive
 * @package Models
 */
class Hive
{
    /** @var \SplObjectStorage $bees */
    protected $bees;

    public function __construct()
    {
        // SPLObjectStorage provides a bit more functionality than a simple array.
        $this->bees = new \SplObjectStorage;
    }

    /**
     * We fill our hive with bees.
     */
    public function fill()
    {
        if ($this->bees->count() == 0) {
            for ($workerBees = 0; $workerBees < 5; $workerBees++) {
                $workerBee = new Bee(Bee::BEE_TYPE_WORKER, 75, 10);
                $this->addBee($workerBee);
            }

            for ($droneBees = 0; $droneBees < 8; $droneBees++) {
                $droneBee = new Bee(Bee::BEE_TYPE_DRONE, 50, 12);
                $this->addBee($droneBee);
            }

            $queenBee = new Bee(Bee::BEE_TYPE_QUEEN, 100, 8);
            $this->addBee($queenBee);
        }
    }

    /**
     * @param Bee $bee
     */
    public function addBee(Bee $bee)
    {
        $this->bees->attach($bee);
    }

    /**
     * @param Bee $bee
     */
    public function removeBee(Bee $bee)
    {
        if ($this->bees->contains($bee)) {
            $this->bees->detach($bee);
        }
    }

    /**
     * Hits a random bee in the hive
     */
    public function hitRandomBee()
    {
        $randomBeeIndex = rand(0, $this->bees->count() - 1);
        $this->bees->rewind();

        for ($i = 0; $i < $randomBeeIndex; $i++) {
            $this->bees->next();
        }

        /** @var Bee $randomBee */
        $randomBee = $this->bees->current();

        $hitBee = $randomBee->hit();

        if($hitBee->isDead()){
            $this->bees->detach($hitBee);
        }

        if ($hitBee->getType() == Bee::BEE_TYPE_QUEEN && $hitBee->isDead()) {

            // The Queen bee is dead! All the other bees must die.
            $this->killAllBees();
        }
    }

    /**
     * Kill all bees and remove them from the hive
     */
    public function killAllBees()
    {
        foreach ($this->bees as $bee) {
            /** @var $bee Bee */
            $bee->killBee();
        }
        $this->bees->removeAll($this->bees);
    }

    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->bees->count() > 0;
    }

    public function getStats(){

        foreach ($this->bees as $bee) {

            /** @var $bee Bee */
            echo "\nBee: {$bee->getType()} Lifespan: {$bee->getLifespan()}";

        }
    }

    /**
     * @return int
     */
    public function beeCount(){
        return $this->bees->count();
    }


}