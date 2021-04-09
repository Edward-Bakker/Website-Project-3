<?php
session_start();
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
    require_once('navbar.php');
    if(isset($_GET["command"]))
    {
        $command = $_GET["command"];
        //The url you wish to send the POST request to
        $url = "localhost:8008/settask";
        //The data you want to send via POST look at manual of api
        $data = array("BotID" => 1, "Task" => "$command" );
        //url-ify the data for the POST
        $data_string = http_build_query($data);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        echo $result;

    }
    ?>
    <div class="flex justify-center m-5">
        <div class="flex justify-center flex-col">
            <div class="bg-gray-600 p-2 rounded">
                <img src="inc/arduino.jpg" alt="Livestream">
            </div>
            <form class="bg-gray-600 p-2 rounded m-2 text-center">
                <select name="command" class="bg-gray-800 p-2 rounded">
                    <option value="race">Race</option>
                    <option value="battle">Battle</option>
                    <option value="jesper">Jesper overrijden</option>
                </select>
                <input type="submit" class="bg-gray-800 p-2 rounded" value="Send command">
            </form>
        </div>
        <div class="border-solid border-8 border-gray-600 p-2 m-2 rounded max-w-xs">
            <h2 class="text-2xl font-bold">Technoking of Battlebots</h2>
            <p>This is some cool description about the Technoking of Battlebots robot.</p>
        </div>
    </div>
</body>

</html>
