<?php
// Initialize the session
session_start();

$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="groupB.css" rel="stylesheet" type="text/css">
    </head>

    <body class="text-white bg">
    <?php
    require_once('navbar.php');
    ?>
        <h1 class="text-center text-4xl m-5 gray">Project Battlebot - Group B</h1>

        <div class="flex flex-col flex-grow wrapper">
            <div class="flex flex-wrap upperHalf justify-between h-2-4">
                <div class="flex flex-col border-b-4 border-l-4 border-r-4 border-solid border-gray-600 bg-gray-400 w-px-500 m-5">
                    <h2 class="bg-gray-600 p-2">Scoreboard</h2>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">1.
                    <?php
                     $result = mysqli_query($conn, "SELECT *FROM robots WHERE team='B'");
                     while ($row = mysqli_fetch_array($result)) {
                         $score1B = $row['game1_score'];
                         echo $score1B;
                     }
                    ?>
                    </div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">2.
                    <?php
                     $result = mysqli_query($conn, "SELECT *FROM robots WHERE team='B'");
                     while ($row = mysqli_fetch_array($result)) {
                         $score2B = $row['game2_score'];
                         echo $score2B;
                     }
                    ?>
                    </div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">3.
                    <?php
                     $result = mysqli_query($conn, "SELECT *FROM robots WHERE team='B'");
                     while ($row = mysqli_fetch_array($result)) {
                         $score3B = $row['game3_score'];
                         echo $score3B;
                     }
                    ?>
                    </div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">4.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">5.</div>
                </div>
                <div class="flex bg-gray-600 w-px-500 m-5">
                    <h2 class="bg-gray-600 p-2 ">Stream</h2>
    <?php
    require_once('navbar.php');
    ?>
    <div class="flex justify-center p-2 m-5">

            <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics" width="480" height="480"></iframe>


        <?php
        // gets all data from camera control table for the request list
        if ($conn === false) {
            die("ERROR could not connect to database " . mysqli_connect_error());
        }
        if($stmt = $conn->prepare("SELECT * FROM camera_control ORDER BY requested_time ASC"))
        {
            $stmt->execute();

            $results = $stmt->get_result();
        }else
        {
            echo "could not execute";
        }
        ?>
                </div>
            </div>
            <div class="flex flex-wrap lowerHalf justify-between h-2-4">
                <div class="flex flex-wrap p-4 justify-center">
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                </div>
                <div class="flex flex-col progressBars p-4">
                    <a href=""><div class="bg-gray-600 w-full h-10 max-h-10 rounded">
                        <p class="text-white text-center ">Enable Sound<p>
                    </div></a>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600 myProgress" id="myProgress1">
                        <div class="h-full bg-gray-600 myBar" id="myBar1"></div>
                    </div>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600 myProgress" id="myProgress2">
                        <div class="h-full bg-gray-600 myBar" id="myBar2"></div>
                    </div>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600 myProgress" id="myProgress3">
                        <div class="h-full bg-gray-600 myBar" id="myBar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>