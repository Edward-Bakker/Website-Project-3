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
    <nav class="flex justify-center flex-wrap">
        <a href="index.html" class="nav-button">Livestream</a>
        <a href="bots.html" class="nav-button">Battlebots</a>
        <a href="games.html" class="nav-button">Games</a>
        <a href="login.php" class="nav-button">Login</a>
        <a href="admin.html" class="nav-button">Admin</a>
    </nav>
    <div class="flex justify-center">
        <form class="flex flex-col bg-gray-600 p-2 rounded m-5" action="register.php" method="POST">
            <input class="mb-2 p-1 rounded" type="email" name="email" placeholder="Email">
            <input class="mb-2 p-1 rounded" type="password" name="password" placeholder="Password">
            <input class="mb-2 p-1 rounded" type="password" name="verifyPassword" placeholder="Password">
            <input class="bg-gray-800 p-2 rounded" name="submit" type="submit" value="Register">
        </form>
    </div>
    <?php


    // Processing form data when form is submitted
    if (isset($_POST['submit'])) {
        $username = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $verifyPassword = filter_var($_POST['verifyPassword'], FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty(trim($username)) && !empty(trim($password)) && !empty(trim($verifyPassword))) {
            if ($password == $verifyPassword) {
                $server = "localhost";
                $user = "root";
                $dbpass = "";
                $dbname = "robot";

                /* Attempt to connect to MySQL database */
                $link = mysqli_connect($server, $user, $dbpass, $dbname);

                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                $sql = "SELECT email FROM user WHERE email='$username'";
                if ($stmt = mysqli_prepare($link, $sql)) {
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            echo "Email is already taken!";
                        } else {

                            $create = "INSERT INTO user (email, password, role) VALUES (?, ?, 'user')";

                            if ($stmtCreate = mysqli_prepare($link, $create)) {

                                // Set parameters
                                $param_username = $username;
                                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmtCreate, "ss", $param_username, $param_password);

                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmtCreate)) {
                                    echo 'Created';
                                    mysqli_stmt_close($stmtCreate);
                                    mysqli_stmt_close($stmt);
                                } else {
                                    echo "Oops! Something went wrong. Please try again later.";
                                }
                            }
                        }
                    } else {
                        echo "<p>Error executing fetching password</p>";
                        die(mysqli_error($link));
                    }
                } else {
                    echo 'Problem';
                }



                mysqli_close($link);
            } else {
                echo 'The passwords are not the same!';
            }
        } else {
            echo "Please fill in both username AND password";
        }
    }
    ?>
</body>

</html>