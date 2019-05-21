<?php

namespace Models;

class Bee
{
    const BEE_TYPE_WORKER = 'WORKER';
    const BEE_TYPE_DRONE = 'DRONE';
    const BEE_TYPE_QUEEN = 'QUEEN';

    protected $type;
    protected $lifespan;
    protected $hitPoints;

    public function __construct($type, $lifespan, $hitPoints)
    {
        $this->type = $type;
        $this->lifespan = $lifespan;
        $this->hitPoints = $hitPoints;
    }

    /**
     * @return Bee
     */
    public function hit()
    {
        $beeTypeLabel = ucfirst(strtolower($this->type));

        echo "\n\nYou took {$this->hitPoints} hit points from a {$beeTypeLabel} bee.\n";

        if ($this->lifespan < $this->hitPoints) {
            $this->lifespan = 0; // Bee is dead.
        } else {
            $this->lifespan -= $this->hitPoints;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getLifespan()
    {
        return $this->lifespan;
    }

    /**
     * @return mixed
     */
    public function getHitPoints()
    {
        return $this->hitPoints;
    }

    public function killBee()
    {
        $this->lifespan = 0;
    }

    /**
     * @return bool
     */
    public function isDead()
    {
        return $this->lifespan == 0;
    }


}