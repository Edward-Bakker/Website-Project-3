<?php
// Initialize the session
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
    <h1 class="text-center text-4xl m-5">Project Battlebot</h1>
    <?php
        require_once('navbar.php');
    ?>
    <div class="flex justify-center font-medium">
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-center mb-4">
                <h2 class="font-medium text-lg self-center truncate">Account information</h2>
            </div>
            <div class="flex w-full mb-4">
                <table style="width: 100%">


                    <?php
                    $server = "localhost";
                    $user = "root";
                    $dbpass = "";
                    $dbname = "robolympics";

                    /* Attempt to connect to MySQL database */
                    $link = mysqli_connect($server, $user, $dbpass, $dbname);

                    // Check connection
                    if ($link === false) {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $sql = "SELECT username, name, team_name FROM users WHERE user_id =" . $_SESSION['user_id'] . "";
                    if ($stmt = mysqli_prepare($link, $sql)) {
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_result($stmt, $username, $name, $team_name);
                        mysqli_stmt_store_result($stmt);
                        mysqli_stmt_fetch($stmt);
                        echo '<tr><td>Username:</td><td>' . $username . '</td></tr>';
                        echo '<tr><td>Name:</td><td>' . $name . '</td></tr>';
                        echo '<tr><td>Team name:</td><td>' . $team_name . '</td></tr>';
                        mysqli_stmt_close($stmt);
                    }
                    mysqli_close($link);
                    ?>
                </table>

            </div>
            <form class="flex flex-col bg-gray-600 p-2 rounded m-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input class="mb-2 p-1 rounded" type="password" name="password" placeholder="Password">
                <input class="mb-2 p-1 rounded" type="password" name="verifyPassword" placeholder="Verify Password">
                <input class="mb-2 p-1 rounded" type="password" name="oldPassword" placeholder="Old Password">
                <input class="bg-gray-800 p-2 rounded" name="update" type="submit" value="Update">
            </form>
        </div>
        <?php
        if (isset($_POST['update'])) {
            $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
            $verifyPassword = filter_var($_POST['verifyPassword'], FILTER_SANITIZE_SPECIAL_CHARS);
            $oldPassword = filter_var($_POST['oldPassword'], FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty(trim($password)) || empty(trim($verifyPassword)) || empty(trim($oldPassword))) {
                echo '<script>alert("Please fill all fields to update the password!")</script>';
            } else {
                if (trim($password) == trim($verifyPassword)) {
                    $server = "localhost";
                    $user = "root";
                    $dbpass = "";
                    $dbname = "robolympics";

                    /* Attempt to connect to MySQL database */
                    $link = mysqli_connect($server, $user, $dbpass, $dbname);

                    // Check connection
                    if ($link === false) {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $sql = "SELECT password FROM users WHERE user_id=" . $_SESSION['user_id'] . "";
                    if ($stmt = mysqli_prepare($link, $sql)) {
                        if (!(mysqli_stmt_execute($stmt))) {
                            echo "<p>Error executing fetching password</p>";
                            die(mysqli_error($link));
                        }  //Fetches the password hash from Database
                    }
                    mysqli_stmt_bind_result($stmt, $passwordHash);
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_fetch($stmt);
                    echo'1';
                    //Stores the password hash
                    if (password_verify($oldPassword, $passwordHash)) {
                        $hashPass = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET password ='$hashPass' WHERE user_id =" . $_SESSION['user_id'] . "";
                        if ($stmt = mysqli_prepare($link, $sql)) {
                            if ((mysqli_stmt_execute($stmt))) {
                                echo 'Password updated!';
                            } else {
                                echo 'Error during the update!';
                            }
                        }
                    } else {
                        echo 'Invalid old password!';
                    }
                } else {
                    echo 'Passwords are not the same!';
                }
            }
        }
        ?>
</body>

</html>