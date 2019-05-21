<?php
declare(strict_types=1);

include('Models/Bee.php');

use Models\Bee;
use PHPUnit\Framework\TestCase;

final class BeeTests extends TestCase
{
    public function testBeeProps(): void
    {
        $bee = new Bee(Bee::BEE_TYPE_QUEEN, 100, 8);

        $this->assertEquals(Bee::BEE_TYPE_QUEEN, $bee->getType());
        $this->assertEquals(100, $bee->getLifespan());
        $this->assertEquals(8, $bee->getHitPoints());
    }


}