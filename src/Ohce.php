<?php

namespace Deg540\PHPTestingBoilerplate;

class Ohce
{
    private HourManager $hourManager;
    private string $name;
    public const STOP_MESSAGE = "Adios ";
    public const PALINDROME_MESSAGE = "¡Bonita palabra!";
    public const GREETING_MESSAGE_NOCHE = "¡Buenas noches ";
    public const GREETING_MESSAGE_TARDE = "¡Buenas tardes ";
    public const GREETING_MESSAGE_DIA = "¡Buenos días ";
    public function __construct(HourManager $hourManager)
    {
        $this->hourManager = $hourManager;
        $this->name = "name default";
    }

    public function ohceResponse(string $inputString): string
    {
        if ($this->isGreeting($inputString)) {
            return $this->returnGreeting($inputString);
        }
        if ($this->isStop($inputString)) {
            return self::STOP_MESSAGE . $this->name;
        }

        if ($this->isPalindrome($inputString)) {
            return strrev($inputString) . "\n" . self::PALINDROME_MESSAGE;
        }
        return strrev($inputString);
    }

    public function isGreeting(string $inputString): bool
    {
        return str_starts_with($inputString, "ohce");
    }

    public function returnGreeting(string $inputString): string
    {
        $this->name = explode(" ", $inputString)[1];
        $hour =  $this->hourManager->returnActualHour();
        if ($hour >= 20 || $hour < 6) {
            return self::GREETING_MESSAGE_NOCHE . $this->name . "!";
        } elseif ($hour >= 6 && $hour < 12) {
            return self::GREETING_MESSAGE_DIA . $this->name . "!";
        }
        return self::GREETING_MESSAGE_TARDE . $this->name . "!";
    }

    public function isStop(string $inputString): bool
    {
        return $inputString == "Stop!";
    }

    public function isPalindrome(string $inputString): bool
    {
        return $inputString == strrev($inputString);
    }
}
