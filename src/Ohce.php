<?php

namespace Deg540\PHPTestingBoilerplate;

class Ohce
{
    private HourManager $hourManager;
    private string $name;
    public function __construct(HourManager $hourManager)
    {
        $this->hourManager = $hourManager;
    }

    public function ohceResponse(string $inputString): string
    {
        if (str_starts_with($inputString, "ohce")) {
            $this->name = explode(" ", $inputString)[1];
            $hour =  $this->hourManager->returnActualHour();
            if ($hour >= 20 || $hour < 6) {
                return "¡Buenas noches " . $this->name . "!";
            } elseif ($hour >= 6 && $hour < 12) {
                return "¡Buenos días " . $this->name . "!";
            }
            return "¡Buenas tardes " . $this->name . "!";
        }
        if ($inputString == "Stop!") {
            return "Adios " . $this->name;
        }
        $inputReverse = strrev($inputString);
        if ($inputString == $inputReverse) {
            return $inputReverse . "\n¡Bonita palabra!";
        }
        return $inputReverse;
    }
}
