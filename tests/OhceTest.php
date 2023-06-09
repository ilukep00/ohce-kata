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
    private Mockery $mockery;
    protected function setUp(): void
    {
        $this->mockery = new Mockery();
        $this->hourManager = $this->mockery::mock(HourManager::class);
        $this->ohce = new Ohce($this->hourManager);
    }

    /**
     * @test
     */
    public function returnLikesWordIfPalindrome()
    {
        $returnMessage = $this->ohce->ohceResponse("oto");

        $this->assertEquals("oto\n" . $this->ohce::PALINDROME_MESSAGE, $returnMessage);
    }
    /**
     * @test
     */
    public function returnReverseWordIfNotPalindrome()
    {
        $returnMessage = $this->ohce->ohceResponse("hola");

        $this->assertEquals("aloh", $returnMessage);
    }
    /**
     * @test
     */
    public function returnBuenasNochesIfHourIsBetween20And6()
    {
        $this->hourManager->expects()->returnActualHour()->andReturn(21);

        $returnMessage = $this->ohce->ohceResponse("ohce luke");

        $this->assertEquals($this->ohce::GREETING_MESSAGE_NOCHE . "luke!", $returnMessage);
    }
    /**
     * @test
     */
    public function returnBuenosDiasIfHourIsBetween6And12()
    {
        $this->hourManager->expects()->returnActualHour()->andReturn(11);

        $returnMessage = $this->ohce->ohceResponse("ohce luke");

        $this->assertEquals($this->ohce::GREETING_MESSAGE_DIA . "luke!", $returnMessage);
    }
    /**
     * @test
     */
    public function returnBuenasTardesIfHourIsBetween12And20()
    {
        $this->hourManager->expects()->returnActualHour()->andReturn(14);

        $returnMessage = $this->ohce->ohceResponse("ohce luke");

        $this->assertEquals($this->ohce::GREETING_MESSAGE_TARDE . "luke!", $returnMessage);
    }
    /**
     * @test
     */
    public function returnAdiosIsWhenWeSendStop()
    {
        $hourManager = $this->mockery::spy(HourManager::class);
        $ohce = new Ohce($hourManager);

        $ohce->ohceResponse("ohce luke");

        $returnMessage =  $ohce->ohceResponse("Stop!");

        $hourManager->shouldHaveReceived()->returnActualHour();

        $this->assertEquals($ohce::STOP_MESSAGE . "luke", $returnMessage);
    }
}
