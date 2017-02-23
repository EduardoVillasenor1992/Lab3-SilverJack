<?php

    // deck for the memeory game
    $ARR = array();
    // array is for player scores
    
    
    $player1 = 0;
    $player2 = 0;
    $player3 = 0;
    $player4 = 0;
    $highScore = 0;
    
    $score = 0;
    
    

    
    
    // for loop creates an array with values from 1 through 52
    for($i = 0; $i < 52; $i++ )        
    {
        $ARR[$i] = $i + 1;
    }
    

    
    // sets the players score
    function player1()
    {
        global $player1;
        global $score;

        playGame();
        
        $player1 = $score;
        echo $player1;

        $score = 0;
        
    }
    function player2()
    {
        global $player2;
        global $score;

        playGame();
        
        $player2 = $score;
        echo $player2;

        $score = 0;
    }
    function player3()
    {
        global $player3;
        global $score;

        playGame();
        
        $player3 = $score;
        echo $player3;

        $score = 0;
    }
    function player4()
    {
        global $player4;
        global $score;

        playGame();
        
        $player4 = $score;
        echo $player4;

        $score = 0;
    }




// plays game
    function playGame()    
    {
        global $ARR;
        
        
        global $player;
        global $score;
        
        $random = 0;
        $temp = 0;
        
        //shuffles the deck randomly
        for($i = 0; $i < count($ARR); $i++)
        {
            
            $random = rand(0,10);
            $temp = $ARR[$i];
            $ARR[$i] = $ARR[$random];
            $ARR[$random] = $temp;
            
        }
        
        //outputs cards as long as its below 39
        do
        {
            $t = $ARR[0];
            echo "<img src = 'img/cards1/$t.png' />";
            
            if($t >= 1 && $t <= 13)
            {
                $score = $score + $t;
            }
            
            
            elseif($t >=14 && $t <= 26)
            {
                $score = $score + $t - 13;
            }
            
            elseif($t >= 27 && $t <=39)
            {
                $score = ($score + $t - 26);
            }
            
            else
            {
                $score = ($score + $t - 39);
            }
            unset($ARR[0]);
            $ARR = array_values($ARR);
            
        }while($score < 39);
        
    
    }
    
    
?>













<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?=player1()?>
        <br/>
        <?=player2()?>
        <br/>
        <?=player3()?>
        <br/>
        <?=player4()?>
        
        

    </body>
</html>