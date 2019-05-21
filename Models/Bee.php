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

    public function hit()
    {
        if($this->lifespan < $this->hitPoints){
            $this->lifespan = 0; // Bee is dead.
        }else{
            $this->lifespan .= $this->hitPoints;
        }
    }


}