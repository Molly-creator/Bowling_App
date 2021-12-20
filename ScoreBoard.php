<?php
require('./Player.php');
class ScoreBoard
{
    // properies
    public array $Score = [];
    private $Players = [];
    public int $Round;

    // methods
    public function __construct($object, $Round)
    {
        //array van alle spelers vanuit class Player. Doorzetten naar calculatie.
        $this->Round = $Round;
        $Players = $this->Players;
        $Players = [];

        //opzetten array structuur met ronde en gegooide worpen.
        for ($i = 0; $i < count($object); $i++) {
            $Name = $object[$i]->getName();
            $Game = $object[$i]->getPinsThrown();
            array_push($Players, ["Name" => $Name, "Game" => $Game]);
        }
        $this->Players = $Players;
        $this->calculatePlayerScore($Players);
    }

    private function calculatePlayerScore($Players)
    {
        //Vanuit Player class. Opbouwen Ass Array van spelernaam en iedere gegooide ronden.
        $Score = $this->Score;
        $Round = $this->Round;
        $Player = $Players;
        $Score = [];
        //loop door score en tel punten op

        for ($p = 0; $p < count($Player); $p++) {
            $Name = $Player[$p]["Name"];
            $Points = 0;
            foreach ($Player[$p]["Game"] as $GameArray => $keys) {
                $Points +=  ($keys["First"] + $keys["Second"]);
            }
            array_push($Score, ["Name" => $Name, "Points" => $Points]);
        }

        //UPDATE score
        $this->Score = $Score;
        $this->calculateAllScores($Player);
    }

    private function calculateAllScores($Player)
    {
        $Score = $this->Score;
        $Round = $this->Round;
        $Player = $Player;

        $PrevRound = $Round - 1;
        $PenRound = $Round - 2;

        // Als er in laatste ronden spare of strike of in voorlaatste strike : extra worpen gooien       

        for ($p = 0; $p < count($Player); $p++) {

            $Name = $Player[$p]["Name"];
            //UPDATE score with bonus
            switch ($Round) {

                case 1:
                    echo "TEST " . $Score[$p]["Points"] . PHP_EOL;
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;
                    break;

                case 2:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;
                    break;

                case 3:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;
                    break;
                case 4:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;

                    break;
                case 5:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;

                    break;
                case 6:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;

                    break;
                case 7:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;

                    break;

                case 8: //penultimate ROUND OF GAME//

                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }

                    $this->Score = $Score;

                    break;

                case 9: //LAST ROUND OF GAME Extra rounds needed
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $Score[$p]["Points"] +=  $BonusPoints;
                    }


                    if ($Player[$p]["Game"][$Round]["Spare"] == true) {
                        echo "Speler $Name gooit een SPARE in ronde $Round ! Voer 1 extra ronde in!\n" . PHP_EOL;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        echo "Speler $Name gooit een STRIKE in ronde $PrevRound ! Voer 1 extra ronde in!\n" . PHP_EOL;
                    } elseif ($Player[$p]["Game"][$Round]["Strike"] == true) {
                        echo "Speler $Name gooit een STRIKE in ronde $Round ! Voer 2 extra ronde in!\n" . PHP_EOL;
                    }

                    $this->Score = $Score;
                    break;
                case 10: //BONUS ROUND 1 //

                    $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                    $Score[$p]["Points"] +=  $BonusPoints;
 
                    $this->Score = $Score;

                    break;
                case 11: //BONUS ROUND 2 //

                    $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                    $Score[$p]["Points"] +=  $BonusPoints;

                    $this->Score = $Score;

                    break;
            }
        }
        $this->Score = $Score;
    }
    public function displayScores()
    {
        //printen naar terminal overzicht van speler en totaal aantal punten.
        $Score = $this->Score;

        $width = "|%-20.20s |%-15.15s |\n";
        echo "----------------------------------------" . PHP_EOL;
        printf($width, " Speler", "  Puntentotaal");
        echo "----------------------------------------" . PHP_EOL;
        $width2 = "| %-19.16s |       %-8.10s |\n";
        for ($p = 0; $p < count($Score); $p++) {

            $Name = $Score[$p]["Name"];
            $Points = $Score[$p]["Points"];

            printf($width2, $Name, $Points);
        }
        echo "|_____________________|________________|" . PHP_EOL;
    }
    public function displayWinner()
    {
        $Score = $this->Score;
        $Winner = [];
        $max = '';
        foreach ($Score as $key => $value) {
            if (is_numeric($value["Points"])) {
                $make_array[] = $value["Points"];
                $max = max($make_array);
            }
        }
        foreach ($Score as $key => $value) {
            $HighSCore = $value["Points"];
            $Name = $value["Name"];
            if ($HighSCore == $max) {
                array_push($Winner, "$Name met $HighSCore punten");
            }
        }

        for ($i = 0; $i < count($Winner); $i++) {
            echo ">>     Winnaar is " . $Winner[$i]  . PHP_EOL;
        }
    }
}
