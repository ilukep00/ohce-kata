<?php

namespace Deg540\PHPTestingBoilerplate;

class Ohce
{
    public function ohceResponse(String $inputString):String
    {
       $inputReverse = strrev($inputString);
       if($inputString == $inputReverse){
           return "¡Bonita palabra!";
       }else{
           return "";
       }
    }
}
