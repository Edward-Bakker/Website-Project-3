<?php
// Initialize the session
session_start();
if ($_SESSION["admin"] == 0)
{
    header("Location: index.php");
}
$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
$userid = filter_input(INPUT_GET, "user", FILTER_SANITIZE_NUMBER_INT);
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
    ?>
    <div class="flex justify-center">
        <a href="adminteams.php" class="nav-button">Teams</a>
        <a href="adminscores.php" class="nav-button">Scores</a>
        <a href="adminbots.php" class="nav-button">Battlebots</a>
        <a href="adminallusers.php" class="nav-button">All Users</a>
    </div>


<?php

if (isset($_POST["submit"]))
{
if (empty($_POST["password"]))
{
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $admin = filter_input(INPUT_POST, "admin", FILTER_SANITIZE_NUMBER_INT);
    $banned = filter_input(INPUT_POST, "banned", FILTER_SANITIZE_NUMBER_INT);
    $teamName = strtoupper(filter_input(INPUT_POST, "teamname", FILTER_SANITIZE_STRING));

    if ($conn === false) {
        die("ERROR could not connect to database " . mysqli_connect_error());
    }
    if($stmt = $conn->prepare("UPDATE users SET name = ?, username = ?, admin = ?  , banned = ? , team_name = ? WHERE user_id = ? "))
    {
        $stmt->bind_param("ssssss", $name, $username, $admin, $banned, $teamName, $userid);
        $stmt->execute();
        $stmt->close();
    }else
    {
        echo "could not execute";
    }
    
}else
{
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $admin = filter_input(INPUT_POST, "admin", FILTER_SANITIZE_NUMBER_INT);
    $banned = filter_input(INPUT_POST, "banned", FILTER_SANITIZE_NUMBER_INT);
    $teamName = strtoupper(filter_input(INPUT_POST, "teamname", FILTER_SANITIZE_STRING));

    if ($conn === false) {
        die("ERROR could not connect to database " . mysqli_connect_error());
    }
    if($stmt = $conn->prepare("UPDATE users SET name = ?, username = ?, admin = ?  , banned = ? , team_name = ? , password = ? WHERE user_id = ? "))
    {
        $stmt->bind_param("sssssss", $name, $username, $admin, $banned, $teamName, $password, $userid);
        $stmt->execute();
        $stmt->close();
    }else
    {
        echo "could not execute";
    }
}
}
if ($conn === false) {
    die("ERROR could not connect to database " . mysqli_connect_error());
}
if($stmt = $conn->prepare("SELECT * FROM users WHERE `user_id` = ?"))
{
    $stmt->bind_param("i", $userid);
    $stmt->execute();

    $results = $stmt->get_result();
    $row = $results->fetch_assoc();
    $stmt->close();
}else
{
    echo "could not execute";
}
?>
<div class="bg-gray-200 min-h-screen pt-2 font-mono my-16">
        <div class="container mx-auto">
            <div class="inputs w-full max-w-2xl p-6 mx-auto">
                <h2 class="text-2xl text-gray-900">Edit user details</h2>
                <form class="mt-6 border-t border-gray-400 pt-4" method="POST">
                    <div class='flex flex-wrap -mx-3 mb-6'>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Name</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' name="name" id='grid-text-1' type='text' value="<?=$row["name"]?>" required>
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Username</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' name="username" id='grid-text-1' type='text' value="<?=$row["username"]?>" required>
                        </div>
                        <div class='w-full md:w-full px-3 mb-6 '>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Password New</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' name="password" id='grid-text-1' type='text' value="">
                        </div>
                        <div class='w-full md:w-1/2 px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Admin</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' name="admin" type='number'  value="<?=$row["admin"]?>" required>
                        </div>
                        <div class='w-full md:w-1/2 px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Banned</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' name="banned" type='number'  value="<?=$row["banned"]?>" required>
                        </div>
                        <div class='w-full md:w-full px-3 mb-6 '>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Team Name</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' name="teamname" id='grid-text-1' type='text' value="<?=$row["team_name"]?>" required>
                        </div>
                            <div class="flex justify-end">
                                <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" name="submit" type="submit">save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
</body>   
</html>