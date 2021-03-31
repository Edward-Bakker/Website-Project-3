<?php
$conn= mysqli_connect("localhost","root","");
mysqli_select_db($conn,"robolympics");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body class="min-h-full bg-gray-800 text-white">
    <h1 class="text-center text-4xl m-5">Project Battlebot</h1>
    <nav class="flex justify-center flex-wrap">
        <a href="index.php" class="nav-button">Livestream</a>
        <a href="bots.html" class="nav-button">Battlebots</a>
        <a href="games.html" class="nav-button">Games</a>
        <a href="login.php" class="nav-button">Login</a>
        <a href="admin.html" class="nav-button">Admin</a>
    </nav>
    <div class="flex justify-center">
        <a href="adminteams.php" class="nav-button">Teams</a>
        <a href="adminscores.php" class="nav-button">Scores</a>
        <a href="adminbots.php" class="nav-button">Battlebots</a>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team A</h2>
            </div>
            <div class="flex justify-left">
                <h3 class="font-medium text-base self-center truncate">Current score:
 				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
				while ($row = mysqli_fetch_array($result)) {
					$score= $row['game1_score'] + $row['game2_score'] + $row['game3_score'];
					echo $score;
				}					
				?>
				</h3>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
				while ($row = mysqli_fetch_array($result)) {
					$name = $row['bot_name'];
					echo $name;
				}					
				?>
				</h3>
            </div>
           <table style="width: 100%">
                <tr>
                    <th style="text-align: center">Members</th>
                </tr>
				<?php
				$result= mysqli_query($conn, "SELECT * FROM members WHERE team='A'");
				while ($row = mysqli_fetch_array($result)) {
					$member= $row['member'];
					echo "<tr><td>" . $member . "</td></tr>";
				}					
				?>
           </table>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team B</h2>
            </div>
            <div class="flex justify-left">
                <h3 class="font-medium text-base self-center truncate">Current score:
 				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
				while ($row = mysqli_fetch_array($result)) {
					$score= $row['game1_score'] + $row['game2_score'] + $row['game3_score'];
					echo $score;
				}					
				?>
				</h3>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
				while ($row = mysqli_fetch_array($result)) {
					$name = $row['bot_name'];
					echo $name;
				}					
				?>
				</h3>
            </div>
            <table style="width: 100%">
                <tr>
                    <th style="text-align: center">Members</th>
                </tr>
				<?php
				$result= mysqli_query($conn, "SELECT * FROM members WHERE team='B'");
				while ($row = mysqli_fetch_array($result)) {
					$member= $row['member'];
					echo "<tr><td>" . $member . "</td></tr>";
				}					
				?>
            </table>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team C</h2>
            </div>
            <div class="flex justify-left">
                <h3 class="font-medium text-base self-center truncate">Current score:
 				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
				while ($row = mysqli_fetch_array($result)) {
					$score= $row['game1_score'] + $row['game2_score'] + $row['game3_score'];
					echo $score;
				}					
				?>
				</h3>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
				while ($row = mysqli_fetch_array($result)) {
					$name = $row['bot_name'];
					echo $name;
				}					
				?>
				</h3>
            </div>
            <table style="width: 100%">
                <tr>
                    <th style="text-align: center">Members</th>
                </tr>
				<?php
				$result= mysqli_query($conn, "SELECT * FROM members WHERE team='C'");
				while ($row = mysqli_fetch_array($result)) {
					$member= $row['member'];
					echo "<tr><td>" . $member . "</td></tr>";
				}					
				?>
            </table>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team D</h2>
            </div>
            <div class="flex justify-left">
                <h3 class="font-medium text-base self-center truncate">Current score:
 				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
				while ($row = mysqli_fetch_array($result)) {
					$score= $row['game1_score'] + $row['game2_score'] + $row['game3_score'];
					echo $score;
				}					
				?>
				</h3>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
				while ($row = mysqli_fetch_array($result)) {
					$name = $row['bot_name'];
					echo $name;
				}					
				?>
				</h3>
            </div>
            <table style="width: 100%">
                <tr>
                    <th style="text-align: center">Members</th>
                </tr>
				<?php
				$result= mysqli_query($conn, "SELECT * FROM members WHERE team='D'");
				while ($row = mysqli_fetch_array($result)) {
					$member= $row['member'];
					echo "<tr><td>" . $member . "</td></tr>";
				}					
				?>
            </table>
        </div>
    </div>

    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Team E</h2>
            </div>
            <div class="flex justify-left">
                <h3 class="font-medium text-base self-center truncate">Current score:
 				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
				while ($row = mysqli_fetch_array($result)) {
					$score= $row['game1_score'] + $row['game2_score'] + $row['game3_score'];
					echo $score;
				}					
				?>
				</h3>
            </div>
            <div class="flex w-full justify-left">
                <h3 class="font-medium text-base self-center truncate">Bot Name:
				<?php
				$result= mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
				while ($row = mysqli_fetch_array($result)) {
					$name = $row['bot_name'];
					echo $name;
				}					
				?>
				</h3>
            </div>
            <table style="width: 100%">
                <tr>
                    <th style="text-align: center">Members</th>
                </tr>
				<?php
				$result= mysqli_query($conn, "SELECT * FROM members WHERE team='E'");
				while ($row = mysqli_fetch_array($result)) {
					$member= $row['member'];
					echo "<tr><td>" . $member . "</td></tr>";
				}					
				?>
            </table>
        </div>
    </div>
</body>
</html>
<?php
    mysqli_close($conn);
?>