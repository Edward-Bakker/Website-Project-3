<?php
if(isset($_SESSION["id"])) {
    unset($_SESSION["id"]);
}

$userid = filter_input(INPUT_GET, "user", FILTER_SANITIZE_NUMBER_INT);
$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
if ($conn === false) {
    die("ERROR could not connect to database " . mysqli_connect_error());
}
if($stmt = $conn->prepare("DELETE FROM camera_control WHERE controlID = ?"))
{
    $stmt->bind_param("s",$userid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("LOCATION: index.php");
}else
{
    echo "could not execute";
}
?>