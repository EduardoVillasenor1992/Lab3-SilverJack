<?php
    // deck for the memory game
    $deckArray = array();
    // array is for player scores
    $player1 = 0;
    $player2 = 0;
    $player3 = 0;
    $player4 = 0;
    $highScore = 0;
    $score = 0;
    $nameArray = ["Doge", "Ed", "Tomas", "Kara"];
    
    // for loop creates an array with values from 1 through 52
    for($i = 0; $i < 52; $i++ ){
        $deckArray[$i] = $i + 1;
    }
    function player1(){
        global $player1;
        global $score;

        playGame();
        
        $player1 = $score;
        echo "<br />";
        echo "<strong>Score: <span class= 'scores'>".$player1."</strong></span>";
        $score = 0;
    }
    
    function player2(){
        global $player2;
        global $score;

        playGame();
        
        $player2 = $score;
        echo "<br />";
        echo "<strong>Score: <span class= 'scores'>".$player2."</strong></span>";
        $score = 0;
    }
    
    function player3(){
        global $player3;
        global $score;

        playGame();
        
        $player3 = $score;
        echo "<br />";
        echo "<strong>Score: <span class= 'scores'>".$player3."</strong></span>";
        $score = 0;
    }
    function player4()
    {
        global $player4;
        global $score;

        playGame();
        
        $player4 = $score;
        echo "<br />";
        echo "<strong>Score: <span class= 'scores'>".$player4."</strong></span>";
        $score = 0;
    }
    
// plays game
    function playGame(){
        global $deckArray;
        global $player;
        global $score;
        
        $random = 0;
        $temp = 0;
        
        //shuffles the deck randomly
        for($i = 0; $i < count($deckArray); $i++){
            $random = rand(0,10);
            $temp = $deckArray[$i];
            $deckArray[$i] = $deckArray[$random];
            $deckArray[$random] = $temp;
        }
        
        //outputs cards as long as its below 39
        do{
            $t = $deckArray[0];
            echo "<img src = 'img/cards1/$t.png' />";
            
            if($t >= 1 && $t <= 13){
                $score = $score + $t;
            }
            elseif($t >=14 && $t <= 26){
                $score = $score + $t - 13;
            }
            elseif($t >= 27 && $t <=39){
                $score = ($score + $t - 26);
            }
            else{
                $score = ($score + $t - 39);
            }
            unset($deckArray[0]);
            $deckArray = array_values($deckArray);
            
        }while($score < 39);
    }
    
    //Displays winner of game
    function displayWinner(){
        $winnerCount = 0;
        $scoresArray = array();
        $winningPoints = 0;
        global $player1, $player2, $player3, $player4, $nameArray;
        
        //Loops player variables to store into array with key and value
        for($i = 1; $i < 5; $i++){
            $scoresArray[$nameArray[$i - 1]] = ${"player". $i};
        }
        
        //Removes scores higher than 42 from array and add points
        foreach ($scoresArray as $key => $value){
            if($value > 42){
                $winningPoints += $scoresArray[$key];
                unset($scoresArray[$key]);
            }
        }
        $scoresArray= array_filter($scoresArray);
        if (empty($scoresArray)) {
            echo "<p><strong>No Winners</strong></p>";
        }else{
            //Check for draws
            foreach ($scoresArray as $key => $value){
                if($value == max($scoresArray)){
                    $winnerCount++;
                }
            }
            if($winnerCount > 1){
                echo "<p><strong>Tie - No Winners</strong></p>";
            }else{
                foreach($scoresArray as $key => $value){
                    //Adds rest of points
                    if($value != max($scoresArray)){
                        $winningPoints += $scoresArray[$key];
                    }
                }
                echo "<p><strong> Points: " . $winningPoints . "</strong></p>";
                echo "<div class='winnerText'><p><strong>" . ucfirst(array_search(max($scoresArray), $scoresArray)) . " is the winner!</strong></p></div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <h1 class= "fonts">Silverjack</h1>
        <h3 class= "fonts">a Game of Luck</h3>
        <figure>
            <img src="img/pic.jpg" class = "images" alt="picture of dog" />
            <figcaption class="fonts"><strong>Doge</strong></figcaption>
            <?=player1()?>
        </figure>
        <br/>
        <figure>
            <img src="img/edv.jpg" class = "images" alt="picture of human" />
            <figcaption class="fonts"><strong>Ed</strong></figcaption>
            <?=player2()?>
        </figure>
        
        <br/>
        <figure>
            <img src="img/toh.jpg" class = "images" alt="picture of human" />
            <figcaption class="fonts"><strong>Tomas</strong></figcaption>
            <?=player3()?>
        </figure>
        
        <br/>
        <figure>
            <img src="img/kas.jpg" class = "images" alt="picture of human female" />
            <figcaption class="fonts"><strong>Kara</strong></figcaption>
            <?=player4()?>
        </figure>
        
        <br/>
        <?=displayWinner()?>
        <form>
            <input type="button" value="Refresh" onClick="history.go(0)"/>
        </form>

    </body>
</html>