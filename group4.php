<?php
    session_start();
    $config = require_once('config.php');
    $conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
    if (isset($_SESSION['botID']))
    {
    unset($_SESSION['botID']);
    }
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

    $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.samklop.xyz/bots",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
      
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        echo "<pre>";
        echo "</pre>";
        $data = json_decode($response, true);
        //getting data for robot 4 (D)
        foreach ($data as $bots)
        {
            if (is_array($bots))
            {
                $sped = $bots[3][4]["data"];
                $sound = $bots[3][4]["data"]; 
                //echo $sped;
                // checking if its int data
                if(is_numeric($sped)&& is_numeric($sound))
                {
                $sped = $bots[3][4]["data"];
                $sound = $bots[3][4]["data"]; 
                $_SESSION['Speed2'] = $sped;

                }
                else 
                {
                    $sped = $_SESSION['Speed2'];
                    $sound = $_SESSION['Speed2'];

                }
            }

        }
        // test if the functions work with those 2 values
        // comment them afterwards
    //  $sped = 10 ;
    //  $sound = 10;


        
    
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="groupD.css" rel="stylesheet" type="text/css">
        <script src="fireworks.js" type="module" defer></script>
        <script defer type="module">
            import initiateFirework from "./fireworks.js";
            if(<?php echo $_SESSION["firework"]; ?> < <?php echo $completedGames; ?>){
                initiateFirework();
            }
        </script>
        <?php $_SESSION["firework"] = $completedGames; ?>
    </head>

    

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
                    <?php
                    require_once('navbar.php');
                    ?>


                    <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics" width="500"></iframe>


                    <?php
                    // gets all data from camera control table for the request list
                    if ($conn === false) {
                        die("ERROR could not connect to database " . mysqli_connect_error());
                    }
                    if ($stmt = $conn->prepare("SELECT * FROM camera_control ORDER BY requested_time ASC")) {
                        $stmt->execute();

                        $results = $stmt->get_result();
                    } else {
                        echo "execution unsuccessful";
                    }
                    ?>
                    <!-- <h2 class="bg-gray-600 p-2 text-gray-800">Stream</h2> -->
                </div>
            </div>
            <div class="flex flex-wrap lowerHalf justify-between h-2-4">
                <div class="flex flex-wrap p-4 justify-center">
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="relay"></div>
                        <p class="my-2 text-center"><b>Relay Race</b></p>
                        <!-- <button class="rounded-full text-white px-6 py-2 yellow">Start</button> -->
                    </div>
                    <div class="flex flex-col my-1 mx-3 p-4 justify-center">
                        <div class="icons" id="tictactoe"></div>
                        <p class="my-2 text-center"><b>Tic-Tac-Toe</b></p>
                        <!-- <button class="rounded-full text-white px-6 py-2 yellow">Start</button> -->
                    </div>
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="shapeDraw"></div>
                        <p class="my-2 text-center"><b>Shape Draw</b></p>
                        <!-- <button class="-600 rounded-full text-white px-6 py-2 yellow">Start</button> -->
                    </div>
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="maze"></div>
                        <p class="my-2 text-center"><b>Maze</b></p>
                        <!-- <button class="rounded-full text-white px-6 py-2 yellow">Start</button> -->
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
                    <div class="gameStats flex">
                        <div id="currentPlacement" class="gameStatCard flex">
                            <img src="groupDImg/bestPlace1.png" alt="Indicates played games" class="statsImage">
                        <div class="flex flex-col statText"> Current Placement:<span class="yellowFont"> <?php echo $ids[array_search("D", array_keys($scores))] ?> </span></div> 
                        </div>
                        <div id="gamesCompleted" class="gameStatCard flex">
                            <img src="groupDImg/<?php echo $completedGames?>.png" alt="Indicates played games" class="statsImage">
                            <div class="flex flex-col statText"></span> Games Completed: <span class="yellowFont"><?php echo $completedGames?></div> 
                        </div>
                        
                    </div>
                    <!--            sound sources-->
                    <audio id="start">
            <source src="sound/Acceleration.mp3" type="audio/mpeg">
            </audio>
            <audio id="speed1">
                <source src="sound/SpeedDrifting.mp3" type="audio/mpeg">
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
        
        <script>
            var i = 0;
            
//            // the battery starts again if it hits 0
//            if (sessionStorage.getItem("timer") <= 1)
//            {
//                sessionStorage.setItem("timer", "100");
//            }
            if (i == 0) {
                i = 1;
                // variables for the sound
                var Start = document.getElementById("start");
                var Speed1 = document.getElementById("speed1");
                var Speed2 = document.getElementById("speed2");
                var Speed3 = document.getElementById("speed3");
                var Speed4 = document.getElementById("speed4");
                // functions for sound
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

                // THIS FUNCTION IS THE BATTERY FEATURE
                // THIS FUNCTION DOES NOT WORK PROPERLY
                
//                var timer2 = localStorage.getItem("seconds");
//                var timer = parseInt(timer2);
//
//                function Taimer() {
//                    // this is the time removal for the battery
//                    timer = timer - 1;
//                    var x = localStorage.getItem("timer");;
//                    x.toString();
//                    sessionStorage.setItem("timer", x)
//                    document.getElementById("myBar1").innerHTML = timer + "%";
//                    document.getElementById("myBar1").style.width = timer + "%";
//
//                }
//
//                Taimer();
//                var time = setInterval(Taimer, 5000);

                //this changes the speed bar up/down
                var elem = document.getElementById("myBar");
                var id = setInterval(myFunction, 20);
                var sound = "<?php echo($sound); ?>";
                sound.toString();
                sessionStorage.setItem("sound", sound);
                function myFunction() {
                    if (sound >= sound2) {
                        // it goes up
                        sound2++;
                        elem.style.width = sound2 + "%";
                        elem.innerHTML = sound2 + "%";
                     
                    } else {
                        // goes down
                        document.getElementById("myBar").innerHTML = sound + "%";
                        document.getElementById("myBar").style.width = sound + "%";
                    }
                       var sound2 = sound;
                        sound2.toString();
                        sessionStorage.setItem("sound2", sound2)

                }

            }


            // reloads the page every 10 seconds
            var timeout = setTimeout("location.reload(true);", 10000);
            
            //updates the div for music
            function AudioReload() {
                $("#here").load(window.location.href + " #here");
            }

            var Audio = setInterval(AudioReload, 3000);


        </script>

            <div id="here">  
            <?php
            // the music conditions

                
            if ($sped <= 10) {
                echo "<script> playAudioStart(); </script>";
                
            } else if ($sped > 10 && $sped < 20) {
                echo "<script> playAudioSpeed1(); </script>";
            
            } else if ($sped >= 20 && $sped <= 40) {
                echo "<script> playAudioSpeed2(); </script>";
            
            } else if ($sped > 40 && $sped <= 70) {
                echo "<script> playAudioSpeed3(); </script>";
                
            } else if ($sped > 70 && $sped <= 100) {
                echo "<script> playAudioSpeed4(); </script>";
                
            }

            ?>
            </div>
                
 
            </div>
    </body>
</html>