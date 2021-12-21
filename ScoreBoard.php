<?php
require('./Player.php');
class ScoreBoard
{
    // properies
    private array $Score = [];
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
        $Round = $this->Round;
        $Player = $Players;
        //loop door score en tel punten op

        for ($p = 0; $p < count($Player); $p++) {
            $Name = $Player[$p]["Name"];
            $Points = 0;
            foreach ($Player[$p]["Game"] as $GameArray => $keys) {
                $Points +=  ($keys["First"] + $keys["Second"]);
            }
            array_push($this->Score, ["Name" => $Name, "Points" => $Points]);
        }

        //UPDATE score
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
                case 0:
                        break;
                case 1:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $this->Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $this->Score[$p]["Points"] +=  $BonusPoints;
                    }

                    break;
                    
                default:
                    if ($Player[$p]["Game"][$PrevRound]["Spare"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $this->Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PrevRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $this->Score[$p]["Points"] +=  $BonusPoints;
                    } elseif ($Player[$p]["Game"][$PenRound]["Strike"] == true) {
                        $BonusPoints = ($Player[$p]["Game"][$Round]["First"] + $Player[$p]["Game"][$Round]["Second"]);
                        $this->Score[$p]["Points"] +=  $BonusPoints;
                    }

                    break;
            }
        }
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
            echo ">>  De winnaar is " . $Winner[$i]  . PHP_EOL;
        }
    }
}
