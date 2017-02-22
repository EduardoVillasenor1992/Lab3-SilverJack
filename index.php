<?php

    // deck for the memeory game
    $ARR = array();     
    $dealer = 0;
    $player = 0;
    $score = 0;
    
    
    //tells the user who won
    
    
    // for loop creates an array with values from 1 through 52
    for($i = 0; $i < 52; $i++ )        
    {
        $ARR[$i] = $i + 1;
    }
    
    // sets the dealers score
    function dealer()
    {
        global $dealer;
        global $player;
        global $score;

        playGame();
        $dealer = $score;
        $score = 0;
        
    }
    //checks the dealers cards compared to the player and outputs score
    function checkDealerCards()
    {
        global $dealer;
        global $player;
        global $score;
        echo $dealer;
    }
    
    // checks players cards compared to the dealer and outputs score
    function checkPlayerCards()
    {
        global $dealer;
        global $player;
        global $score;
        if($player > $dealer)
        {
            echo "you win ";
            
        }
        elseif($dealer > $player)
        {
            echo "you lose ";
            
        }
        else
        {
            echo "DRAW ";
            
        }
        
        echo $player;
        
    }

    
    // sets the players score
    function player()
    {
        global $dealer;
        global $player;
        global $score;

        playGame();
        
        $player = $score;
        $score = 0;
    }





    function playGame()    
    {
        global $ARR;
        
        global $dealer;
        global $player;
        global $score;
        
        $random = 0;
        $temp = 0;
        
        //shuffles the deck randomly
        for($i = 0; $i < count($ARR); $i++)
        {
            
            $random = rand(0,30);
            $temp = $ARR[$i];
            $ARR[$i] = $ARR[$random];
            $ARR[$random] = $temp;
            
        }
        
        
        // displays two cards and then removes 
        
        for($j = 0; $j < 2; $j++)
        {
            
            $t = $ARR[$j];
            echo "<img src = 'img/cards1/$t.png' />";
            
            if($t >= 1 && $t <= 13)
            {
                $score = $score + $t;
                
            }
            
            
            elseif($t >=14 && $t <= 26)
            {
                if($t == 24)
                {
                    $score = ($score + $t - 11);
                }
                elseif($t == 25)
                {
                    $score = ($score + $t - 12);
                }
                elseif($t == 26)
                {
                    $score = ($score + $t - 13);
                }
                else
                {
                    $score = ($score + $t - 13);
                }
                
            }
            
            elseif($t >= 27 && $t <=39)
            {
                if($t == 37)
                {
                    $score = ($score + $t - 24);
                }
                elseif($t == 38)
                {
                    $score = ($score + $t - 25);
                }
                elseif($t == 39)
                {
                    $score = ($score + $t - 26);
                }
                else
                {
                    $score = ($score + $t - 26);
                }
            }
            
            else
            {
                if($t == 50)
                {
                    $score = ($score + $t - 37);
                }
                elseif($t == 51)
                {
                    $score = ($score + $t - 38);
                }
                elseif($t == 52)
                {
                    $score = ($score + $t - 39);
                }
                else
                {
                    $score = ($score + $t - 39);
                }
            }
            
        }
        
        unset($ARR[0]);
        unset($ARR[1]);
        $ARR = array_values($ARR);
        
    }

    
  

    
    
    
?>




<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?=dealer()?>
        <br/>
        <?=checkDealerCards()?>
        <br/>
        <?=player()?>
        <br/>
        <?=checkPLayerCards()?>
        

    </body>
</html>