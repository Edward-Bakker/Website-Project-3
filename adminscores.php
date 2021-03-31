<?php
$conn= mysqli_connect("localhost","root","");
mysqli_select_db($conn,"battlebot");
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
        <a href="index.html" class="nav-button">Livestream</a>
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
    <div class="flex justify-center flex-wrap">
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold"> 				
			<?php
				$result= mysqli_query($conn, "SELECT * FROM games WHERE game_name='Tic tac toe'");
				while ($row = mysqli_fetch_array($result)) {
					$gamename= $row['game_name'];
					echo $gamename;
				}					
				?>
			</h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
					<th class="px-4 text-xl">New Score</th>
                </tr>
                <tr>
					<td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='A'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						//$game1teamA = 0;
						if(isset($_POST['submitGame1bot1'])) 
							{
								$game1teamA=$_POST['newScoreGame1bot1'];
								//$sql = "UPDATE bots SET bot_name='$newNameB' WHERE team='B'";

								//$stmt= mysqli_prepare($conn, $sql)
								//OR DIE(mysqli_error($conn));
					
								//mysqli_stmt_execute($stmt)
								//OR DIE (mysqli_error($conn));
					
								//mysqli_stmt_close($stmt);
								//header("Location: " . $_SERVER['PHP_SELF']);
							}
						echo $game1teamA;
						?>
					</td>
					<td>
						<form name="game1bot1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<input size="1" type="number" id="newScoreGame1bot1" name="newScoreGame1bot1">
							<input type="submit" name="submitGame1bot1" value="Edit score">
						</form>
					</td>
                </tr>
                <tr>
                    <td>				
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='B'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game1teamC = 0;
						echo $game1teamC;			
						?>
				</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='C'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game1teamC = 0;
						echo $game1teamC;
						?>
					</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='D'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game1teamD = 0;
						echo $game1teamD;
						?>
					</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='E'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game1teamE = 0;
						echo $game1teamE;
						?>
					</td>
					<td>Edit</td>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">
				<?php
				$result= mysqli_query($conn, "SELECT * FROM games WHERE game_name='Maze'");
				while ($row = mysqli_fetch_array($result)) {
					$gamename= $row['game_name'];
					echo $gamename;
				}					
				?>
				</h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                </tr>
                <tr>
					<td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='A'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game2teamA = 0;
						echo $game2teamA;
						?>
				</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>				
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='B'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game2teamB = 0;
						echo $game2teamB;
						?>
				</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='C'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game2teamC = 0;
						echo $game2teamC;
						?>
					</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='D'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game2teamD = 0;
						echo $game2teamD;
						?>
					</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='E'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game2teamE = 0;
						echo $game2teamE;
						?>
					</td>
					<td>Edit</td>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">
				<?php
				$result= mysqli_query($conn, "SELECT * FROM games WHERE game_name='Idk'");
				while ($row = mysqli_fetch_array($result)) {
					$gamename= $row['game_name'];
					echo $gamename;
				}					
				?>
				</h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                </tr>
                <tr>
					<td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='A'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game3teamA = 0;
						echo $game3teamA;
						?>
				</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>				
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='B'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game3teamB = 0;
						echo $game3teamB;
						?>
				</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='C'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game3teamC = 0;
						echo $game3teamC;
						?>
					</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='D'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game3teamD = 0;
						echo $game3teamD;
						?>
					</td>
					<td>Edit</td>
                </tr>
                <tr>
                    <td>
						<?php
						$result= mysqli_query($conn, "SELECT * FROM bots WHERE team='E'");
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['bot_name'];
							echo $name;
						}					
						?>
					</td>
                    <td>
					 	<?php
						$game3teamE = 0;
						echo $game3teamE;
						?>
					</td>
					<td>Edit</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
<?php
    mysqli_close($conn);
?>