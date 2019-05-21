<?php
declare(strict_types=1);

include('Models/Hive.php');

use Models\Hive;
use PHPUnit\Framework\TestCase;

final class HiveTests extends TestCase
{
    public function testHiveProps(): void
    {
        $hive = new Hive();

        $this->assertEquals(0, $hive->beeCount());

        $hive->fill();

        $this->assertNotEquals(0, $hive->beeCount());
        $this->assertEquals(14, $hive->beeCount());

    }

}