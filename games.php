<?php
session_start();
$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);

//Calculating overall scores
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
while ($row = mysqli_fetch_array($result)) {
    $scoreTeamA = $row['game1_score'] + $row['game2_score'] + $row['game3_score']+ $row['game4_score'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
while ($row = mysqli_fetch_array($result)) {
    $scoreTeamB = $row['game1_score'] + $row['game2_score'] + $row['game3_score']+ $row['game4_score'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
while ($row = mysqli_fetch_array($result)) {
    $scoreTeamC = $row['game1_score'] + $row['game2_score'] + $row['game3_score']+ $row['game4_score'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
while ($row = mysqli_fetch_array($result)) {
    $scoreTeamD = $row['game1_score'] + $row['game2_score'] + $row['game3_score']+ $row['game4_score'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
while ($row = mysqli_fetch_array($result)) {
    $scoreTeamE = $row['game1_score'] + $row['game2_score'] + $row['game3_score']+ $row['game4_score'];
}

//Fetching names of bots
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
while ($row = mysqli_fetch_array($result)) {
	$nameTeamA = $row['bot_name'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
while ($row = mysqli_fetch_array($result)) {
	$nameTeamB = $row['bot_name'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
while ($row = mysqli_fetch_array($result)) {
	$nameTeamC = $row['bot_name'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
while ($row = mysqli_fetch_array($result)) {
	$nameTeamD = $row['bot_name'];
}
$result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
while ($row = mysqli_fetch_array($result)) {
	$nameTeamE = $row['bot_name'];
}


//Assigning scores to bots
$points = array (
$nameTeamA => $scoreTeamA,
$nameTeamB => $scoreTeamB,
$nameTeamC => $scoreTeamC,
$nameTeamD => $scoreTeamD,
$nameTeamE => $scoreTeamE
);

arsort($points);
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
    <div class="flex justify-center flex-wrap">
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">Overall Standing</h1>
            <table class="mx-auto">
                <tr>
					<th class="px-4 text-xl">Position</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
						<?php
						echo array_keys($points)[0];
						?>
                    </td>
					<td>
						<?php
						echo array_values($points)[0];
						?>
					</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
						<?php
						echo array_keys($points)[1];
						?>
                    </td>
					<td>
						<?php
						echo array_values($points)[1];
						?>
					</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
						<?php
						echo array_keys($points)[2];
						?>
                    </td>
					<td>
						<?php
						echo array_values($points)[2];
						?>
					</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
						<?php
						echo array_keys($points)[3];
						?>
                    </td>
					<td>
						<?php
						echo array_values($points)[3];
						?>
					</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
						<?php
						echo array_keys($points)[4];
						?>
                    </td>
					<td>
						<?php
						echo array_values($points)[4];
						?>
					</td>
                </tr>
            </table>
        </div>
	</div>
    <div class="flex justify-center flex-wrap">
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM games WHERE game_id=1");
					while ($row = mysqli_fetch_array($result)) {
						$gamename = $row['game_name'];
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
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score1A = $row['game1_score'];
                            echo $score1A;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score1B = $row['game1_score'];
                            echo $score1B;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score1C = $row['game1_score'];
                            echo $score1C;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score1D = $row['game1_score'];
                            echo $score1D;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score1E = $row['game1_score'];
                            echo $score1E;
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM games WHERE game_id=2");
					while ($row = mysqli_fetch_array($result)) {
						$gamename = $row['game_name'];
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
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score2A = $row['game2_score'];
                            echo $score2A;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
					<td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score2B = $row['game2_score'];
                            echo $score2B;
                        }
                        ?>
					</td>
                </tr>
                <tr>
                    <td>
						<?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score2C = $row['game2_score'];
                            echo $score2C;
                        }
                        ?>
					</td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score2D = $row['game2_score'];
                            echo $score2D;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score2E = $row['game2_score'];
                            echo $score2E;
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM games WHERE game_id=3");
					while ($row = mysqli_fetch_array($result)) {
						$gamename = $row['game_name'];
						echo $gamename;
					}
				?>
			<h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score3A = $row['game3_score'];
                            echo $score3A;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score3B = $row['game3_score'];
                            echo $score3B;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score3C = $row['game3_score'];
                            echo $score3C;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score3D = $row['game3_score'];
                            echo $score3D;
                        }
                        ?>
                    </td>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score3E = $row['game3_score'];
                            echo $score3E;
                        }
                        ?>
                    </td>
                </tr>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
        <h1 class="text-4xl font-bold">Game4</h1>
            <h1 class="text-4xl font-bold">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM games WHERE game_id=4");
					while ($row = mysqli_fetch_array($result)) {
						$gamename = $row['game_name'];
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
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='A'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score4A = $row['game4_score'];
                            echo $score4A;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='B'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score4B = $row['game4_score'];
                            echo $score4B;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='C'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score4C = $row['game4_score'];
                            echo $score4C;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='D'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score4D = $row['game4_score'];
                            echo $score4D;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['bot_name'];
                            echo $name;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM robots WHERE team='E'");
                        while ($row = mysqli_fetch_array($result)) {
                            $score4E = $row['game4_score'];
                            echo $score4E;
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>
