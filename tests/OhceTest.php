<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\Ohce;
use PHPUnit\Framework\TestCase;

final class OhceTest extends TestCase
{
    /**
     * @test
     */
     public function returnBuenaPalabraIfInputIsPalindrome(){
        $ohce = new Ohce();

        $returnMessage = $ohce ->ohceResponse("oto");

         $this->assertEquals("¡Bonita palabra!",$returnMessage);
    }
}
