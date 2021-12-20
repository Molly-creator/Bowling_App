<?php

class Player
{
    private $name;
    private $pinsThrown = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function throwPins()
   {    
    //    KEUZE UIT HANDMATIG OF RANDOM INPUT:
        $AvailablePins = 10;

        // try {
        //     $Throw1 = readline("$this->name, voer je eerste worp in!: ");
        //     while(!is_numeric($Throw1  ) || $Throw1 > 10) {
        //         echo "Invoer is ongeldig\n" . PHP_EOL;
        //         $Throw1 = readline("$this->name, voer je eerste worp in!: ");
        //     }
            
        //     $AvailablePins -= $Throw1;
            
    
        //     if ($Throw1 == 10) {
        //         $Throw2 = 0;
        //     } else {
        //         $Throw2 = readline("$this->name, voer je tweede worp in!: ");
        //         while (!is_numeric($Throw2) || $Throw2 > $AvailablePins) {
        //             echo "Invoer is ongeldig\n" . PHP_EOL;
        //             $Throw2 = readline("$this->name, voer je tweede worp in!: ");
        //         }
        //     }
        
        // } catch (TypeError $Error) {
        //     echo "Er ging iets mis!" . PHP_EOL;
        // }

        // TESTING WITH RANDOM INPUT
 
        $Throw1 = random_int(0, 10);
        echo "$this->name, eerste worp: $Throw1" . PHP_EOL;
        $AvailablePins -=  $Throw1;
        $Throw2 = random_int(0, $AvailablePins);
        echo "$this->name, tweede worp: $Throw2\n" . PHP_EOL;   

        if ($Throw1 == 10) {
            echo "$this->name gooit een STRIKE !" . PHP_EOL;
            array_push($this->pinsThrown, ['First' => $Throw1, 'Second' => $Throw2, 'Spare' => (bool)False, 'Strike' => (bool)True]);
        } elseif (($Throw1 + $Throw2) == 10) {
            echo "$this->name gooit een SPARE !" . PHP_EOL;
            array_push($this->pinsThrown, ['First' => $Throw1, 'Second' => $Throw2, 'Spare' => (bool)True, 'Strike' => (bool)False]);
        } else {
            array_push($this->pinsThrown, ['First' => $Throw1, 'Second' => $Throw2, 'Spare' => (bool)False, 'Strike' => (bool)False]);
        }
        
        // $this->pinsThrown = $pinsThrown;
    } 

    public function getPinsThrown()
    {   
        return $this->pinsThrown;
    }

    public function getName()
    {
        return $this->name;
    }
}
