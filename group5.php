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

    function setBotTask()
    {
        $command = $_SESSION["data"];
        //The url you wish to send the POST request to (change url)
        $url = "https://api.samklop.xyz/settask";
        //The data you want to send via POST look at manual of api
        $data = array('id' => 5, 'task' => $command);
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    }
    $_SESSION["data"] ="";
    if(isset($_SESSION["data"]))
    {
        $_SESSION["data"] = filter_input(INPUT_GET, "data", FILTER_SANITIZE_URL);
        setBotTask();
    }
    
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="groupecss.css" rel="stylesheet" type="text/css">
        <link href="individualLayout.css" rel="stylesheet" type="text/css">
        <link href="groupEimg/fonts/stylesheet.css" rel="stylesheet" type="text/css">
    </head>
    <script>
        var refreshElement = document.getElementById('refresh');

        function sleep(ms)
        {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function reload(container){
            container.src = "http://foscam.serverict.nl/snapshot.cgi?&user=gast&pwd=gast&t=" + Math.random();;

            await sleep(500);

            //this line is to watch the result in console , you can remove it later
            console.log("Refreshed");
        }
    </script>

    <body class="bg-red-700 text-white">
    <div class="bg"></div>
<div class="lightning flashit"></div>
        <h1 class="text-center text-4xl m-5 fon">PROJECT BATTLEBOT - GROUP E</h1>
        <?php
        require_once('navbar.php');
        ?>
        <div class="flex flex-col flex-grow wrapper">
            <div class="flex flex-wrap upperHalf justify-between h-2-4">
                <div class="flex flex-col border-b-4 border-l-4 border-r-4 border-solid border-red-700  bg-transparent w-px-500 m-5">
                    <h2 class="bg-red-700 p-2 text-gray-100">Scoreboard</h2>
                    <?php
                    $ids = ['first', 'second', 'third', 'fourth', 'fifth'];
                    $place = 1;
                    foreach($scores as $team => $score){
                        echo '<div class="flex flex-grow text-gray-100 bg-opacity-25 bg-red-700 px-3 items-center p-1">' . $place . ': Team ' .  $team . " : " . ' ' . $score . ' Pts</div>';
                        $place++;
                    }

                ?>
                </div>
                <div class="flex bg-red-700 w-px-500 m-5">
                    <!-- <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics"></iframe> -->
                        <img src="http://foscam.serverict.nl/snapshot.cgi?&user=gast&pwd=gast&t=" class="livestreamVideo" name="refresh" id="refresh" onload="reload(this)" onerror="reload(this)">
                </div>
            </div>
            <div class="flex flex-wrap lowerHalf justify-between h-2-4">
                <div class="flex flex-wrap p-4 justify-center">
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <img class="icons" src="groupEimg/Relayrace.svg">
                        <p class="my-2 text-center text-gray-100"><b>Relay Race</b></p>
                        <?php
                        if (isset($_SESSION["team_name"]) AND $_SESSION["team_name"] == "E"):
                        ?>
                        <a href="group5.php?data=relayrace" class="rounded-full text-white px-6 py-2 bg-red-700">Start</a>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="flex flex-col my-1 mx-3 p-4 justify-center">
                    <img class="icons" src="groupEimg/tictaktoe.svg">
                        <p class="my-2 text-center text-gray-100"><b>Tic-Tac-Toe</b></p>
                        <?php
                        if (isset($_SESSION["team_name"]) AND $_SESSION["team_name"] == "E"):
                        ?>
                        <a href="group5.php?data=tictactoe" class="rounded-full text-white px-6 py-2 bg-red-700">Start</a>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <img class="icons" src="groupEimg/ShapeDraw.svg">
                            <p class="my-2 text-center text-gray-100"><b>Shape Draw</b></p>
                            <?php
                        if (isset($_SESSION["team_name"]) AND $_SESSION["team_name"] == "E"):
                        ?>
                            <a href="group5.php?data=shaperedraw" class="rounded-full text-white px-6 py-2 bg-red-700">Start</a>
                            <?php
                        endif;
                        ?>
                        </div>
                        <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                        <img class="icons" src="groupEimg/maze.svg">
                                <p class="my-2 text-center text-gray-100"><b>Maze</b></p>
                                <?php
                        if (isset($_SESSION["team_name"]) AND $_SESSION["team_name"] == "E"):
                        ?>
                                <a href="group5.php?data=maze" class="rounded-full text-white px-6 py-2 bg-red-700">Start</a>
                                <?php
                        endif;
                        ?>
                            </div>
                            <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                            <?php
                        if (isset($_SESSION["team_name"]) AND $_SESSION["team_name"] == "E"):
                        ?>
                                <a href="group5.php?data=idle" class="rounded-full text-white px-6 py-2 bg-red-700">STOP</a>
                                <?php
                        endif;
                        ?>
                            </div>
                </div>
                <!-- Tesla car goes here -->
                </div>
            </div>
        </div>
    </body>
</html>