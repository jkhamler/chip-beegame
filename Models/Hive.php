<?php


namespace Models;


class Hive
{
    /** @var \SplObjectStorage $bees */
    protected $bees;

    public function __construct()
    {
        $this->bees = new \SplObjectStorage;
    }

    public function addBee(Bee $bee)
    {
        $this->bees->attach($bee);
    }

    public function removeBee(Bee $bee)
    {

        if ($this->bees->contains($bee)) {
            $this->bees->detach($bee);
        }

    }

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

        if ($hitBee->getType() == Bee::BEE_TYPE_QUEEN && $hitBee->isDead()) {

            // The Queen bee is dead! All the other bees must die.
            $this->killAllBees();
        }
    }

    public function killAllBees()
    {
        foreach ($this->bees as $bee) {
            /** @var $bee Bee */
            $bee->killBee();
            $this->bees->detach($bee);
        }
    }


}