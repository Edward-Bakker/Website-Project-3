<?php
session_start();
$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);

// creates session of first row in camera control database
if ($conn === false) {
    die("ERROR could not connect to database " . mysqli_connect_error());
}
if($stmt = $conn->prepare("SELECT * FROM camera_control LIMIT 1"))
{
    $stmt->execute();
    $results = $stmt->get_result();
    $row = $results->fetch_assoc();
    if($results->num_rows > 0)
    {
        $_SESSION["cameraMainControl"] = $row["name"];
        $_SESSION["timestamp"] = $row["requested_time"];
        $_SESSION["id"] = $row["controlID"];
    }
    else
    {
        // its a key of course ;)
        // listen if no one knows it good so shhhhhhh (っ ͡❛ ͜ʖ ͡❛)っ
        $_SESSION["cameraMainControl"] = "kjbdejbskfnbsjkabfilsanbfuiqbw4523fuy3v2u3v34jh43hjbkek";
    }
}else
{
    echo "could not execute";
}
if (!isset($_SESSION["userCameraControl"]))
{
    $_SESSION["userCameraControl"] = "";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="refresh" content="30" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body class="min-h-full bg-gray-800 text-white">
    <?php
    require_once('navbar.php');
    ?>
    <div class="flex justify-center p-2 m-5">
        <div class="bg-gray-600 rounded">
            <?php
            // $Username = "user";
            // $Password = "user_12";
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, "http://foscam.serverict.nl/videostream.cgi");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //10 seconds
            // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); //kept trying options till it worked
            // curl_setopt($ch, CURLOPT_USERPWD, "$Username:$Password");
            // $result = curl_exec($ch);
            // //$resultStatus = curl_getinfo($ch);
            // //print 'ResultStatus:'.print_r($resultStatus) . "<br>";
            // curl_close($ch);
            // echo ($result);
            ?>
            <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics" width="640" height="480"></iframe>
        </div>

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

        // adds new name to list and database for camera control and reloads the page to refresh list
        if (isset($_POST["submit_name"]))
        {
            $requestName = filter_input(INPUT_POST, "request_name", FILTER_SANITIZE_STRING);
            if($stmt = $conn->prepare("INSERT INTO camera_control (name) Values (?)"))
            {
                $stmt->bind_param("s", $requestName);
                $stmt->execute();
                $stmt->close();
                $_SESSION["userCameraControl"] = $requestName;
                header("LOCATION: index.php");
            }else
    {
        echo "could not execute";
    }
        }
        ?>

        <?php
        //checks if the user session name is the same as the current in the list to allow control for only that user or admins
        if (!isset($_SESSION["admin"])) {
            $_SESSION["admin"] = 0;
        }
        if (isset($_SESSION["userCameraControl"]) && isset($_SESSION["cameraMainControl"])) :

            if ($_SESSION["userCameraControl"] == $_SESSION["cameraMainControl"] OR $_SESSION["admin"] == 1):
            ?>
            <div class="bg-gray-300 rounded">
                <iframe src="http://foscam.serverict.nl/camera.htm" title="Robolympics" width="200" height="480"></iframe>
            </div>
            <?php
            endif;
        endif;
        ?>


        <div class="flex float-left m-5">
           <table class="w-full border table-auto">
        <thead>
          <tr>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Request List</th>
            <?php
            if ($_SESSION["admin"] == 1):
            ?>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Remove User</th>
            <?php 
            endif; 
            ?>
          </tr>
        </thead>
        <tbody class="divide-y bg-gray-500">
        <?php
            while ($row = $results->fetch_assoc()):
            ?>
            <tr>
            <td class="px-6 py-4 text-center"><?=$row["name"]?></td>
            <?php
            if ($_SESSION["admin"] == 1):
            ?>
            <td class="px-6 py-4 text-center"><a href = <?php echo "removeuser.php?user=" . $row["controlID"]?>>Remove</a></td>
            <?php 
            endif; 
            ?>
        </tr>
            <?php endwhile?>
        </tbody>
        </div>
    </div>
    <?php
    if ($_SESSION["userCameraControl"] == "" && $_SESSION["admin"] == 0):
    ?>
        <div class="float-right m-5">
        <form method="POST">
        <input type="text" name="request_name" placeholder="Enter Name" value="" required>
        <input type="submit" name="submit_name" value="Request Control">
        </form>
        </div>
    <?php
    endif;
    if(isset($_SESSION["timestamp"])){
        if (time() - strtotime($_SESSION["timestamp"]) >= 60 && time() - strtotime($_SESSION["timestamp"]) != time()) {
            $_SESSION["userCameraControl"] = "";
            $_SESSION["timestamp"] = 0;
            header("LOCATION: removeuser.php?user=" . $_SESSION["id"]);
        }
    }
    
    
    ?>
</body>

</html>
