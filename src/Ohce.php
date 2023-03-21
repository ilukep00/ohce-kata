<?php

namespace Deg540\PHPTestingBoilerplate;

class Ohce
{
    private HourManager $hourManager;
    public function __construct(HourManager $hourManager)
    {
        $this->hourManager = $hourManager;
    }

    public function ohceResponse(string $inputString): string
    {
        if (str_starts_with($inputString, "ohce")) {
            $name = explode(" ", $inputString)[1];
            $hour =  $this->hourManager->returnActualHour();
            if ($hour >= 20 || $hour < 6) {
                return "¡Buenas noches " . $name . "!";
            } elseif ($hour >= 6 && $hour < 12) {
                return "¡Buenos días " . $name . "!";
            }
            return "¡Buenas tardes " . $name . "!";
        }
        $inputReverse = strrev($inputString);
        if ($inputString == $inputReverse) {
            return "¡Bonita palabra!";
        }
        return $inputReverse;
    }
}
