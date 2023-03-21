<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\HourManager;
use Deg540\PHPTestingBoilerplate\Ohce;
use PHPUnit\Framework\TestCase;
use Mockery;

final class OhceTest extends TestCase
{
    private HourManager $hourManager;
    private Ohce $ohce;
    protected function setUp(): void
    {
        $mockery = new Mockery();
        $this->hourManager = $mockery::mock(HourManager::class);
        $this->ohce = new Ohce($this->hourManager);
    }

    /**
     * @test
     */
    public function returnBonitaPalabraIfInputIsPalindrome()
    {
        $returnMessage = $this->ohce->ohceResponse("oto");

        $this->assertEquals("¡Bonita palabra!", $returnMessage);
    }
    /**
     * @test
     */
    public function returnReverseStringIfInputIsNotPalindrome()
    {
        $returnMessage = $this->ohce->ohceResponse("hola");

        $this->assertEquals("aloh", $returnMessage);
    }
    /**
     * @test
     */
    public function returnBuenasNochesIfHourIsBetween20And6()
    {
        $this->hourManager->allows()->returnActualHour()->andReturn(21);

        $returnMessage = $this->ohce->ohceResponse("ohce luke");

        $this->assertEquals("¡Buenas noches luke!", $returnMessage);
    }
    /**
     * @test
     */
    public function returnBuenosDiasIfHourIsBetween6And12()
    {
        $this->hourManager->allows()->returnActualHour()->andReturn(11);

        $returnMessage = $this->ohce->ohceResponse("ohce luke");

        $this->assertEquals("¡Buenos días luke!", $returnMessage);
    }
    /**
     * @test
     */
    public function returnBuenasTardesIfHourIsBetween12And20()
    {
        $this->hourManager->allows()->returnActualHour()->andReturn(14);

        $returnMessage = $this->ohce->ohceResponse("ohce luke");

        $this->assertEquals("¡Buenas tardes luke!", $returnMessage);
    }
}
