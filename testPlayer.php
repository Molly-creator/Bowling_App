<?php
require('./ScoreBoard.php');

//--------------------- TEST CASE 5 spelers en 10 rondes van 2 worpen ---------------------//
//---------------------------------- SCOREBOARD -------------------------------------------//

// Ronde 1
$player1 = new Player('Stan Marsh');
$player2 = new Player('Kyle Broflovski');
$player3 = new Player('Kenny McCormick');
$player4 = new Player('Eric Cartman');
$player5 = new Player('Leopold Stotch');

for ($i = 0; $i < 10 ;$i++) {
    echo "\r\nSCOREBOARD van ronde ". ($i+1) . PHP_EOL; 
    echo "Spelers: {$player1->getName()}, {$player2->getName()}, {$player3->getName()}, {$player4->getName()} en {$player5->getName()}\r\n" . PHP_EOL;
    $player1->throwPins();
    $player2->throwPins();
    $player3->throwPins();
    $player4->throwPins();
    $player5->throwPins();
    $player1->getPinsThrown();
    $player2->getPinsThrown();
    $player3->getPinsThrown();
    $player4->getPinsThrown();
    $player5->getPinsThrown();
    $PuntenPlayers = new ScoreBoard([$player1, $player2, $player3, $player4, $player5], $i);
    $PuntenPlayers->displayScores();   
}

//---------------------------------- BONUS ROUND 1 -------------------------------------------//
// echo "\r\nSCOREBOARD van bonusronde 1" . PHP_EOL; 
//     echo "Spelers: {$player1->getName()}, {$player2->getName()}, {$player3->getName()}, {$player4->getName()} en {$player5->getName()}\r\n" . PHP_EOL;
//     $player1->throwPins();
//     $player2->throwPins();
//     $player3->throwPins();
//     $player4->throwPins();
//     $player5->throwPins();
//     $player1->getPinsThrown();
//     $player2->getPinsThrown();
//     $player3->getPinsThrown();
//     $player4->getPinsThrown();
//     $player5->getPinsThrown();
//     $PuntenPlayers = new ScoreBoard([$player1, $player2, $player3, $player4, $player5], 10);
//     $PuntenPlayers->displayScores();  

//---------------------------------- BONUS ROUND 2 -------------------------------------------//
// echo "\r\nSCOREBOARD van bonusronde 2" . PHP_EOL; 
//     echo "Spelers: {$player1->getName()}, {$player2->getName()}, {$player3->getName()}, {$player4->getName()} en {$player5->getName()}\r\n" . PHP_EOL;
//     $player1->throwPins();
//     $player2->throwPins();
//     $player3->throwPins();
//     $player4->throwPins();
//     $player5->throwPins();
//     $player1->getPinsThrown();
//     $player2->getPinsThrown();
//     $player3->getPinsThrown();
//     $player4->getPinsThrown();
//     $player5->getPinsThrown();
//     $PuntenPlayers = new ScoreBoard([$player1, $player2, $player3, $player4, $player5], 11);
//     $PuntenPlayers->displayScores();  

//---------------------------------- EINDE SPEL ----------------------------------------//
echo "\n ---------------------------------- WINNAAR ! ----------------------------------" . PHP_EOL;
echo PHP_EOL;
$PuntenPlayers->displayWinner();
echo "\n ---------------------------------- EINDE SPEL ----------------------------------" . PHP_EOL;

?>