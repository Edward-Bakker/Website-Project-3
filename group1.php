<?php
session_start();
$botID = "1";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body class="min-h-full bg-gray-800 text-white">
    <?php
    function setTask($task, $botid)
    {
        $url = "https://api.samklop.xyz/settask";
        $data = ['id' => $botid, 'task' => $task];
        $dataString = http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
    }

    if (isset($_GET['command']) && !empty($_GET['command']))
        $command = filter_input(INPUT_GET, 'command', FILTER_SANITIZE_STRING);
    else
        $command = null;

    if (isset($_GET["backward"]))
        setTask('backward', $botID);
    else if (isset($_GET["stopMotor"]))
        setTask('stopmotor', $botID);
    else if (isset($_GET["right"]))
        setTask('right', $botID);
    else if (isset($_GET["left"]))
        setTask('left', $botID);
    else if (isset($_GET["forward"]))
        setTask('forward', $botID);
    else
        setTask($command, $botID);

    require_once('navbar.php');
    ?>
    <div class="flex justify-center m-5">
        <div class="flex justify-center flex-col">
            <div class="bg-gray-600 p-2 rounded">
                <img src="http://foscam.serverict.nl/snapshot.cgi?&user=gast&pwd=gast&t=" class="livestreamVideo" name="refresh" id="refresh" onload="reload(this)" onerror="reload(this)">
            </div>
            <form class="bg-gray-600 p-2 rounded m-2 text-center" action=<?= $_SERVER['PHP_SELF'] ?> method="get">
                <select name="command" class="bg-gray-800 p-2 rounded text-white">
                    <?php
                    if ($command === null)
                        $command = 'race';

                    foreach (["Race", "TikTacToe", "Maze", "ShapeRedraw", "Idle"] as $val) : ?>
                        <option value="<?= strtolower($val) ?>" <?= (strtolower($val) === $command) ? 'selected="selected"' : ''; ?>>
                            <?= $val ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="bg-gray-800 p-2 rounded text-white" value="Send command">
            </form>
            <form class="bg-gray-600 p-2 rounded m-2 text-center" action=<?= $_SERVER['PHP_SELF'] ?> method="get">
                <div class="flex justify-center flex-row">
                    <input type="submit" name="forward" class="bg-gray-600 p-2 rounded text-white" value="Forward">
                    <input type="submit" name="left" class="bg-gray-600 p-2 rounded text-white" value="Left">
                    <input type="submit" name="right" class="bg-gray-600 p-2 rounded text-white" value="Right">
                    <input type="submit" name="backward" class="bg-gray-600 p-2 rounded text-white" value="Backward">
                    <input type="submit" name="stopMotor" class="bg-gray-600 p-2 rounded text-white" value="Stop Motor">
                </div>
            </form>
        </div>
        <div class="border-solid border-8 border-gray-600 p-2 m-2 rounded max-w-xs">
            <h2 class="text-2xl font-bold">Technoking of Battlebots</h2>
            <p>It just works. - Todd Howard</p>
            <div>
                <img src="inc/speaker.png" alt="Mute Button" onclick="sound()">
            </div>
        </div>
    </div>
    <script>
        var audio = new Audio('sound/speaker-test-sample.wav');
        audio.loop = true;

        function sound() {
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        }
    </script>
</body>

</html>
