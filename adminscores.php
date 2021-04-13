<?php
// Initialize the session
session_start();
if ($_SESSION["admin"] == 0)
{
    header("Location: index.php");
}

$config = require_once('config.php');
$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
?>

<!doctype html>
<html lang="en">

<head>
	<style> 
		input[type=number], select {
		width: 20%;
		}
	</style>
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
                    <th class="px-4 text-xl">Team</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                    <th class="px-4 text-xl">Add/Deduct Points</th>
                </tr>
                <tr>
                    <td>
                        A
                    </td>
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
                    <td>
                        <form name="game1botA" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame1botA" name="newScoreGame1botA">
                            <input type="submit" name="submitGame1botA" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame1botA'])) {
                            $newScoreGame1botA = $_POST['newScoreGame1botA'] + $score1A;
                            $sql = "UPDATE robots SET game1_score=$newScoreGame1botA WHERE team='A'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        B
                    </td>
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
                    <td>
                        <form name="game1botB" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame1botB" name="newScoreGame1botB">
                            <input type="submit" name="submitGame1botB" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame1botB'])) {
                            $newScoreGame1botB = $_POST['newScoreGame1botB'] + $score1B;
                            $sql = "UPDATE robots SET game1_score=$newScoreGame1botB WHERE team='B'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        C
                    </td>
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
                    <td>
                        <form name="game1botC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame1botC" name="newScoreGame1botC">
                            <input type="submit" name="submitGame1botC" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame1botC'])) {
                            $newScoreGame1botC = $_POST['newScoreGame1botC'] + $score1C;
                            $sql = "UPDATE robots SET game1_score=$newScoreGame1botC WHERE team='C'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        D
                    </td>
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
                    <td>
                        <form name="game1botD" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame1botD" name="newScoreGame1botD">
                            <input type="submit" name="submitGame1botD" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame1botD'])) {
                            $newScoreGame1botD = $_POST['newScoreGame1botD'] + $score1D;
                            $sql = "UPDATE robots SET game1_score=$newScoreGame1botD WHERE team='D'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        E
                    </td>
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
                    <td>
                        <form name="game1botE" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame1botE" name="newScoreGame1botE">
                            <input type="submit" name="submitGame1botE" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame1botE'])) {
                            $newScoreGame1botE = $_POST['newScoreGame1botE'] + $score1E;
                            $sql = "UPDATE robots SET game1_score=$newScoreGame1botE WHERE team='E'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <form name="game1name" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameGame1" name="newNameGame1" placeholder="Edit game name">
                        <input type="submit" name="submitGame1name" value="Edit name" class="submit">
                    </form>
                    <?php
                    if (isset($_POST['submitGame1name'])) {
                        $newNameGame1 = $_POST['newNameGame1'];
                        $sql = "UPDATE games SET game_name='$newNameGame1' WHERE game_id=1";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
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
                    <th class="px-4 text-xl">Team</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                    <th class="px-4 text-xl">Add/Deduct Points</th>
                </tr>
                <tr>
                    <td>
                        A
                    </td>
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
                    <td>
                        <form name="game2botA" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame2botA" name="newScoreGame2botA">
                            <input type="submit" name="submitGame2botA" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame2botA'])) {
                            $newScoreGame2botA = $_POST['newScoreGame2botA'] + $score2A;
                            $sql = "UPDATE robots SET game2_score=$newScoreGame2botA WHERE team='A'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        B
                    </td>
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
                    <td>
                        <form name="game2botB" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame2botB" name="newScoreGame2botB">
                            <input type="submit" name="submitGame2botB" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame2botB'])) {
                            $newScoreGame2botB = $_POST['newScoreGame2botB'] + $score2B;
                            $sql = "UPDATE robots SET game2_score=$newScoreGame2botB WHERE team='B'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        C
                    </td>
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
                    <td>
                        <form name="game2botC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame2botC" name="newScoreGame2botC">
                            <input type="submit" name="submitGame2botC" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame2botC'])) {
                            $newScoreGame2botC = $_POST['newScoreGame2botC'] + $score2C;
                            $sql = "UPDATE robots SET game2_score=$newScoreGame2botC WHERE team='C'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        D
                    </td>
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
                    <td>
                        <form name="game2botD" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame2botD" name="newScoreGame2botD">
                            <input type="submit" name="submitGame2botD" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame2botD'])) {
                            $newScoreGame2botD = $_POST['newScoreGame2botD'] + $score2D;
                            $sql = "UPDATE robots SET game2_score=$newScoreGame2botD WHERE team='D'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        E
                    </td>
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
                    <td>
                        <form name="game2botE" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame2botE" name="newScoreGame2botE">
                            <input type="submit" name="submitGame2botE" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame2botE'])) {
                            $newScoreGame2botE = $_POST['newScoreGame2botE'] + $score2E;
                            $sql = "UPDATE robots SET game2_score=$newScoreGame2botE WHERE team='E'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <form name="game2name" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameGame2" name="newNameGame2" placeholder="Edit game name">
                        <input type="submit" name="submitGame2name" value="Edit name" class="submit">
                    </form>
                    <?php
                    if (isset($_POST['submitGame2name'])) {
                        $newNameGame2 = $_POST['newNameGame2'];
                        $sql = "UPDATE games SET game_name='$newNameGame2' WHERE game_id=2";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
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
            </h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Team</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                    <th class="px-4 text-xl">Add/Deduct Points</th>
                </tr>
                <tr>
                    <td>
                        A
                    </td>
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
                    <td>
                        <form name="game3botA" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame3botA" name="newScoreGame3botA">
                            <input type="submit" name="submitGame3botA" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame3botA'])) {
                            $newScoreGame3botA = $_POST['newScoreGame3botA'] + $score3A;
                            $sql = "UPDATE robots SET game3_score=$newScoreGame3botA WHERE team='A'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        B
                    </td>
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
                    <td>
                        <form name="game3botB" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame3botB" name="newScoreGame3botB">
                            <input type="submit" name="submitGame3botB" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame3botB'])) {
                            $newScoreGame3botB = $_POST['newScoreGame3botB'] + $score3B;
                            $sql = "UPDATE robots SET game3_score=$newScoreGame3botB WHERE team='B'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        C
                    </td>
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
                    <td>
                        <form name="game3botC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame3botC" name="newScoreGame3botC">
                            <input type="submit" name="submitGame3botC" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame3botC'])) {
                            $newScoreGame3botC = $_POST['newScoreGame3botC'] + $score3C;
                            $sql = "UPDATE robots SET game3_score=$newScoreGame3botC WHERE team='C'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        D
                    </td>
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
                    <td>
                        <form name="game3botD" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame3botD" name="newScoreGame3botD">
                            <input type="submit" name="submitGame3botD" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame3botD'])) {
                            $newScoreGame3botD = $_POST['newScoreGame3botD'] + $score3D;
                            $sql = "UPDATE robots SET game3_score=$newScoreGame3botD WHERE team='D'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        E
                    </td>
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
                    <td>
                        <form name="game3botE" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame3botE" name="newScoreGame3botE">
                            <input type="submit" name="submitGame3botE" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame3botE'])) {
                            $newScoreGame3botE = $_POST['newScoreGame3botE'] + $score3E;
                            $sql = "UPDATE robots SET game3_score=$newScoreGame3botE WHERE team='E'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <form name="game3name" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameGame3" name="newNameGame3" placeholder="Edit game name">
                        <input type="submit" name="submitGame3name" value="Edit name" class="submit">
                    </form>
                    <?php
                    if (isset($_POST['submitGame3name'])) {
                        $newNameGame3 = $_POST['newNameGame3'];
                        $sql = "UPDATE games SET game_name='$newNameGame3' WHERE game_id=3";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
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
                    <th class="px-4 text-xl">Team</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                    <th class="px-4 text-xl">Add/Deduct Points</th>
                </tr>
                <tr>
                    <td>
                        A
                    </td>
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
                    <td>
                        <form name="game4botA" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame4botA" name="newScoreGame4botA">
                            <input type="submit" name="submitGame4botA" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame4botA'])) {
                            $newScoreGame4botA = $_POST['newScoreGame4botA'] + $score4A;
                            $sql = "UPDATE robots SET game4_score=$newScoreGame4botA WHERE team='A'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        B
                    </td>
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
                    <td>
                        <form name="game4botB" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame4botB" name="newScoreGame4botB">
                            <input type="submit" name="submitGame4botB" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame4botB'])) {
                            $newScoreGame4botB = $_POST['newScoreGame4botB'] + $score4B;
                            $sql = "UPDATE robots SET game4_score=$newScoreGame4botB WHERE team='B'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        C
                    </td>
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
                    <td>
                        <form name="game4botC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame4botC" name="newScoreGame4botC">
                            <input type="submit" name="submitGame4botC" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame4botC'])) {
                            $newScoreGame4botC = $_POST['newScoreGame4botC'] + $score4C;
                            $sql = "UPDATE robots SET game4_score=$newScoreGame4botC WHERE team='C'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        D
                    </td>
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
                    <td>
                        <form name="game4botD" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame4botD" name="newScoreGame4botD">
                            <input type="submit" name="submitGame4botD" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame4botD'])) {
                            $newScoreGame4botD = $_POST['newScoreGame4botD'] + $score4D;
                            $sql = "UPDATE robots SET game4_score=$newScoreGame4botD WHERE team='D'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        E
                    </td>
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
                    <td>
                        <form name="game4botE" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="number" id="newScoreGame4botE" name="newScoreGame4botE">
                            <input type="submit" name="submitGame4botE" value="Edit score" class="submit">
                        </form>
                        <?php
                        if (isset($_POST['submitGame4botE'])) {
                            $newScoreGame4botE = $_POST['newScoreGame4botE'] + $score4E;
                            $sql = "UPDATE robots SET game4_score=$newScoreGame4botE WHERE team='E'";

                            $stmt = mysqli_prepare($conn, $sql)
                                or die(mysqli_error($conn));

                            mysqli_stmt_execute($stmt)
                                or die(mysqli_error($conn));

                            mysqli_stmt_close($stmt);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <form name="game4name" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" id="newNameGame4" name="newNameGame4" placeholder="Edit game name">
                        <input type="submit" name="submitGame4name" value="Edit name" class="submit">
                    </form>
                    <?php
                    if (isset($_POST['submitGame4name'])) {
                        $newNameGame4 = $_POST['newNameGame4'];
                        $sql = "UPDATE games SET game_name='$newNameGame4' WHERE game_id=4";

                        $stmt = mysqli_prepare($conn, $sql)
                            or die(mysqli_error($conn));

                        mysqli_stmt_execute($stmt)
                            or die(mysqli_error($conn));

                        mysqli_stmt_close($stmt);
                    }
                    ?>
                </tr>
            </table>
        </div>
	</div>
        <div  id="zeroButtonDiv">
            <form name="zero" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input width="100%" type="submit" name="zeroScore" value="RESTART SCORES" id="zeroButton">
            </form>
            <?php
            if (isset($_POST['zeroScore'])) {
                $sql = "UPDATE robots SET game1_score=0";

                $stmt = mysqli_prepare($conn, $sql)
                    or die(mysqli_error($conn));

                mysqli_stmt_execute($stmt)
                    or die(mysqli_error($conn));

                $sql = "UPDATE robots SET game2_score=0";

                $stmt = mysqli_prepare($conn, $sql)
                    or die(mysqli_error($conn));

                mysqli_stmt_execute($stmt)
                    or die(mysqli_error($conn));

                $sql = "UPDATE robots SET game3_score=0";

                $stmt = mysqli_prepare($conn, $sql)
                    or die(mysqli_error($conn));

                mysqli_stmt_execute($stmt)
                    or die(mysqli_error($conn));
					
                $sql = "UPDATE robots SET game4_score=0";

                $stmt = mysqli_prepare($conn, $sql)
                    or die(mysqli_error($conn));

                mysqli_stmt_execute($stmt)
                    or die(mysqli_error($conn));

                mysqli_stmt_close($stmt);
            }
            ?>
        </div>
</body>
</html>
<?php
mysqli_close($conn);
?>
