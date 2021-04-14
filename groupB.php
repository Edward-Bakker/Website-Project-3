<?php
// Initialize the session
session_start();

$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
?>

<!doctype html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="groupB.css" rel="stylesheet" type="text/css">
</head>

<body class="text-white bg">
<div class="transparent"> </div>
<video class= "video" src="media/groupB.mp4" muted loop autoplay></video>
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

                <?php
                require_once('navbar.php');
                ?>


                <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics" width="480" height="480"></iframe>


                <?php
                // gets all data from camera control table for the request list
                if ($conn === false) {
                    die("ERROR could not connect to database " . mysqli_connect_error());
                }
                if ($stmt = $conn->prepare("SELECT * FROM camera_control ORDER BY requested_time ASC")) {
                    $stmt->execute();

                    $results = $stmt->get_result();
                } else {
                    echo "could not execute";
                }
                ?>

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
                    <a href="">
                        <div class="bg-gray-600 w-full h-10 max-h-10 rounded">
                            <p class="text-white text-center ">Enable Sound
            </p>
                        </div>
                    </a>
                    <p class="text-gray-600">Battery

            </p>
                    <div class="h-full bg-gray-600 myBar" id="myBar1"></div>
                </div>

                <p>

                <div class="h-full bg-gray-600 myBar" id="myBar2"></div>
            </div>



            <div class="h-full bg-gray-600 myBar" id="myBar3"></div>
        </div>
    </div>
    </div>
    </div>
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

    <?php

    $sound = 20;
    $sped = 150;
    ?>

    <script>
        var i = 0;
        // the battery starts again if it hits 0
        if (sessionStorage.getItem("timer") <= 1) {
            sessionStorage.setItem("timer", "100");
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


            var timer2 = sessionStorage.getItem("timer");
            var timer = parseInt(timer2);

            function Taimer() {
                // this is the time removal for the battery
                timer = timer - 1;
                var x = timer;
                x.toString();
                sessionStorage.setItem("timer", x)
                document.getElementById("myBar1").innerHTML = timer + "%";
                document.getElementById("myBar1").style.width = timer + "%";

            }

            Taimer();
            var myVar = setInterval(Taimer, 2000);


            //this changes the speed bar up/down
            var elem = document.getElementById("myBar");
            var id = setInterval(myFunction, 20);
            var sound = "<?php echo ($sound); ?>";
            sound.toString();
            sessionStorage.setItem("sound", sound)

            function myFunction() {
                if (sound >= sound2) {
                    // it goes up
                    sound++;
                    elem.style.width = sound + "%";
                    elem.innerHTML = sound + "%";
                    var sound2 = sound;
                    sound2.toString();
                    sessionStorage.setItem("sound2", sound2)
                } else {
                    // goes down
                    document.getElementById("myBar").innerHTML = sound + "%";
                    document.getElementById("myBar").style.width = sound + "%";
                }

            }

        }




        // reloads the page every 5 seconds
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

        if ($sped <= 10) {
            echo "<script> playAudioStart(); </script>";
            $sped = 150;
        } else if ($sped > 10 && $sped < 20) {
            echo "<script> playAudioSpeed1(); </script>";
            $sped = 150;
        } else if ($sped >= 20 && $sped <= 40) {
            echo "<script> playAudioSpeed2(); </script>";
            $sped = 150;
        } else if ($sped > 40 && $sped <= 70) {
            echo "<script> playAudioSpeed3(); </script>";
            $sped = 150;
        } else if ($sped > 70 && $sped <= 100) {
            echo "<script> playAudioSpeed4(); </script>";
            $sped = 150;
        }
        ?>

    </div>

</body>

</html>
