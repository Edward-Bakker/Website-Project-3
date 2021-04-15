<?php
session_start();
$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);

// creates session of first row in camera control database
if ($conn === false) {
    die("ERROR could not connect to database " . mysqli_connect_error());
}
if (!isset($_SESSION["userCameraControl"]))
{
    $_SESSION["userCameraControl"] = "";
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
        //change session to random key so still set but not useable
        $_SESSION["cameraMainControl"]="JgERf<7'ojEFpn[q:+;~$^'[E{8!m]";
        $_SESSION["id"] = 0;
    }
}else
{
    echo "could not execute";
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

<body class="min-h-full bg-gray-800 text-white" onload="reload(this)" onerror="reload(this)">
    <?php
    require_once('navbar.php');
    ?>
    <div class="flex justify-center p-2 m-5">
        <div class="bg-gray-600 rounded">
            <!-- <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics" width="640" height="480"></iframe> -->
                <img src="http://foscam.serverict.nl/snapshot.cgi?&user=gast&pwd=gast&t=" class="livestreamVideo" name="refresh" id="refresh" onload="reload(this)" onerror="reload(this)">
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
            $newTimeSession = date("Y-m-d H:i:s");
            if($stmt = $conn->prepare("INSERT INTO camera_control (name,requested_time) Values (?,?)"))
            {
                $stmt->bind_param("ss", $requestName, $newTimeSession);
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
        if (!isset($_SESSION["cameraMainControl"]))
        {
            $_SESSION["cameraMainControl"] = "";
        }
        if (($_SESSION["userCameraControl"]) == ($_SESSION["cameraMainControl"]) || $_SESSION["admin"] == 1) :
            
            if (isset($_SESSION["userCameraControl"]) && isset($_SESSION["cameraMainControl"])):
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
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Ban User</th>
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
            <td class="px-6 py-4 text-center"><a href = <?php echo "removeuser.php?user=" . $row["controlID"]?>>Ban</a></td>
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
            if (time() - strtotime($_SESSION["timestamp"]) >= 60){
                if ($_SESSION["userCameraControl"] == $_SESSION["cameraMainControl"])
                {
                $_SESSION["userCameraControl"] = "";
                $_SESSION["timestamp"] = 0;
                $id = $_SESSION["id"];
                $_SESSION["id"] = 0;
                 header("LOCATION: removeuser.php?user=" . $id); 
                }
            }   
            if ($_SESSION["userCameraControl"] != $_SESSION["cameraMainControl"])
            {
                $newTimeSession = date("Y-m-d H:i:s");
                $userName = $_SESSION["userCameraControl"];
                if($stmt = $conn->prepare("UPDATE camera_control SET requested_time = ? WHERE name = ?"))
                {
                    $stmt->bind_param("ss", $newTimeSession, $userName);
                    $stmt->execute();
                    $stmt->close();
                }else
                {
                    echo "could not execute";
                }
            }
    }   
    
    
    ?>  
</body> 

</html>
