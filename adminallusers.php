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
   if ($conn === false) {
       die("ERROR could not connect to database " . mysqli_connect_error());
   }
   if($stmt = $conn->prepare("SELECT * FROM users"))
   {
       $stmt->execute();

       $results = $stmt->get_result();
   }else
   {
       echo "could not execute";
   }
   ?>
   <!-- component -->
<div class="flex flex-col h-screen">
    <div class="flex-grow overflow-auto">
      <table class="relative w-full border">
        <thead>
          <tr>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">User_id</th>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Name</th>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Username</th>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Admin</th>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Banned</th>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Team_Name</th>
            <th class="sticky top-0 px-6 py-3 text-white bg-gray-900">Edit</th>
          </tr>
        </thead>
        <tbody class="divide-y bg-gray-500">
            <?php
            while ($row = $results->fetch_assoc()):
            ?>
            <tr>
            <td class="px-6 py-4 text-center"><?=$row["user_id"]?></td>
            <td class="px-6 py-4 text-center"><?=$row["name"]?></td>
            <td class="px-6 py-4 text-center"><?=$row["username"]?></td>
            <td class="px-6 py-4 text-center"><?=$row["admin"]?></td>
            <td class="px-6 py-4 text-center"><?=$row["banned"]?></td>
            <td class="px-6 py-4 text-center"><?=$row["team_name"]?></td>
            <td class="px-6 py-4 text-center"><a href = <?php echo "edituser.php?user=" . $row["user_id"]?>>Edit</a></td>
            </tr>
            <?php endwhile; 
            $stmt->close();
            $conn->close();
            ?>
        </tbody>
  </table>
        
        