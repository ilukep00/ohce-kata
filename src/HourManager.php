<?php

namespace Deg540\PHPTestingBoilerplate;

class HourManager
{
    public function returnActualHour(): int
    {
        return date("H");
    }
}
