<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="groupD.css" rel="stylesheet" type="text/css">
    </head>

    <?php
        session_start();
        $config = require_once('config.php');
        $conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
        $scores = [];
        $game1Played = 0;
        $game2Played = 0;
        $game3Played = 0;
        $games = ["game1"];



        $result = mysqli_query($conn, "SELECT *FROM robots");
        while ($row = mysqli_fetch_array($result)) {
            $game1Played = $row["game1_score"] > 0 ? 1 : $game1Played; 
            $game2Played = $row["game2_score"] > 0 ? 1 : $game2Played; 
            $game3Played = $row["game3_score"] > 0 ? 1 : $game3Played; 
            $score = $row['game1_score'] + $row['game2_score'] + $row['game3_score'];
            $scores[$row['team']] = $score;
        }
        arsort($scores, 1);


        
        $completedGames = $game1Played + $game2Played + $game3Played;
    ?>

    <body class="text-white">
        <canvas id="canvas"></canvas>
        <div id="fireworkButton" class="yellow">:)</div>
        <h1 class="text-center text-4xl m-5 title">Project Battlebot - Group D</h1>
        <?php
        require_once('navbar.php');
        ?>
        <div class="flex flex-col flex-grow wrapper">
            <div class="flex flex-wrap upperHalf justify-between h-2-4">
                <div class="flex flex-col w-px-500 m-5">
                    <h2 class="p-2 text-gray-800 yellow">Scoreboard</h2>
                    <?php
                        $ids = ['first', 'second', 'third', 'fourth', 'fifth'];
                        $place = 1;
                        foreach($scores as $team => $score){
                            echo '<div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="' . $ids[$place-1] . '">' . $place . ': Team ' .  $team . ' (' . $score . ' Pts)</div>';
                            $place++;
                        }

                    ?>
                    <!-- <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="first">1.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="second">2.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="third">3.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="fourth">4.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="fifth">5.</div> -->
                </div>
                <div class="flex bg-gray-600 w-px-500 m-5">
                    <!-- <h2 class="bg-gray-600 p-2 text-gray-800">Stream</h2> -->
                </div>
            </div>
            <div class="flex flex-wrap lowerHalf justify-between h-2-4">
                <div class="flex flex-wrap p-4 justify-center">
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="relay"></div>
                        <p class="my-2 text-center"><b>Relay</b></p>
                        <button class="rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                    <div class="flex flex-col my-1 mx-3 p-4 justify-center">
                        <div class="icons" id="tictactoe"></div>
                        <p class="my-2 text-center"><b>Tic-Tac-Toe</b></p>
                        <button class="rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="shapeDraw"></div>
                        <p class="my-2 text-center"><b>Shape Draw</b></p>
                        <button class="-600 rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="maze"></div>
                        <p class="my-2 text-center"><b>Maze</b></p>
                        <button class="rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                </div>
                <div class="flex flex-col progressBars p-4">
                    <a href=""><div class="greyBlue w-full h-10 max-h-10 rounded py-1">
                        <p class="text-white text-center ">Enable Sound<p>
                    </div></a>
                    <p class="textGrey"><b>Speed</b><p>
                    <div class="w-full border-4 border-solid myProgress" id="myProgress">
                        <div class="bg-gray-600 myBar" id="myBar">0%</div>
                    </div>
                    <p class="textGrey"><b>Battery</b><p>
                    <div class="w-full border-4 border-solid myProgress" id="myProgress1">
                        <div class="bg-gray-600 myBar" id="myBar1">0%</div>
                    </div>
                    <div class="gameStats flex">
                        <div id="currentPlacement" class="gameStatCard flex">
                            <img src="groupDImg/bestPlace1.png" alt="Indicates played games" class="statsImage">
                        <div class="flex flex-col statText"> Current Placement: <?php echo $ids[array_search("D", array_keys($scores))] ?> </div> 
                        </div>
                        <div id="gamesCompleted" class="gameStatCard flex">
                            <img src="groupDImg/<?php echo $completedGames?>.png" alt="Indicates played games" class="statsImage">
                            <div class="flex flex-col statText"><?php echo $completedGames?> Games Played</div> 
                        </div>
                        
                    </div>
                    <!--            sound sources-->
                    <audio id="start">
                        <source src="sound/Acceleration.mp3" type="audio/mpeg">
                    </audio>
                    <audio id="speed1">
                        <source src="sound/Speed1.mp3" type="audio/mpeg">
                    </audio>
                    <audio id="speed2">
                        <source src="sound/Speed2.mp3" type="audio/mpeg">
                    </audio>
                    <audio id="speed3">
                        <source src="sound/Speed3.mp3" type="audio/mpeg">
                    </audio>
                    <audio id="speed4">
                        <source src="sound/Speed4.mp3" type="audio/mpeg">
                    </audio>
                </div>
            </div>
        </div>
        <?php
            // everything "timer" related goes for the audio
 
            // random variable i used for the speed
            $fift = 31;
//            if(!isset($_SESSION["timer"]))
//            {
//                $_SESSION["timer"] = "100";
//            }
//            var_dump($_SESSION["timer"]);
 
            ?>
        <script src="fireworks.js"></script>
        <script>
                var i = 0;
                if (sessionStorage.getItem("timer") <= 1)
                {
                    sessionStorage.setItem( "timer", "100");
                }
                if (i == 0) {
                    i = 1;
                    var Start = document.getElementById("start");
                    var Speed1 = document.getElementById("speed1");
                    var Speed2 = document.getElementById("speed2");
                    var Speed3 = document.getElementById("speed3");
                    var Speed4 = document.getElementById("speed4");
 
                    function playAudioStart() {
                        Start.play();
                    }
                    function playAudioSpeed1() {
                        Speed1.play();
                    }
                    function playAudioSpeed2() {
                        Speed2.play();
                    }
                    function playAudioSpeed3() {
                        Speed3.play();
                    }
                    function playAudioSpeed4() {
                        Speed4.play();
                    }
 
                    var elem = document.getElementById("myBar");
                    var timer2 = sessionStorage.getItem("timer");
                    var timer = parseInt(timer2);
                    var fifty = 50;
                    var id = setInterval(myFunction, 20);
                    var width = 50;
                    function Taimer() {
                        // this is the time removal for the battery
                        timer = timer - 1;
                        var x = timer;
                        x.toString();
                        sessionStorage.setItem( "timer", x)
                        document.getElementById("myBar1").innerHTML = timer + "%";
                        document.getElementById("myBar1").style.width = timer + "%";
                       
                    }
 
                    Taimer();
                    var myVar = setInterval(Taimer, 2000);
 
 
                    //this changes the speed bar from
                    function myFunction() {
                        if (fifty >= width) {
                            // it goes up
                            width++;
                            elem.style.width = width + "%";
                            elem.innerHTML = width + "%";
                        } else {
                            // goes down
                            document.getElementById("myBar").innerHTML = fifty + "%";
                            document.getElementById("myBar").style.width = fifty + "%";
                        }
 
                    }
 
                }
 
 
 
 
                   // reloads the page every 5seconds
                var timeout = setTimeout("location.reload(true);", 5000);
                //updates the div for music
                function AudioReload() {
                    $("#here").load(window.location.href + " #here");
                }
 
                var Audio = setInterval(AudioReload, 3000);
 
               
            </script>
            <div id="here">  
                <?php
 
                // the div for music, with a random variable
                $a = 30;
                if ($a <= 10) {
                    echo "<script> playAudioStart(); </script>";
                } else if ($a > 10 && $a < 20) {
                    echo "<script> playAudioSpeed1(); </script>";
                    $a=150;
                } else if ($a >= 20 && $a <= 40) {
                    echo "<script> playAudioSpeed2(); </script>";
                    
                } else if ($a > 40 && $a <= 70) {
                    echo "<script> playAudioSpeed3(); </script>";
                } else if ($a > 70 && $a <= 100) {
                    echo "<script> playAudioSpeed4(); </script>";
                }
                
                ?>
 
            </div>
    </body>
</html>