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
    <div class="flex justify-center">
        <form class="flex flex-col bg-gray-600 p-2 rounded m-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input class="mb-2 p-1 rounded" name="name" placeholder="Name" id="inputField">
            <input class="mb-2 p-1 rounded" name="team_name" placeholder="Team Name" id="inputField">
            <input class="mb-2 p-1 rounded" type="email" name="email" placeholder="Email" id="inputField">
            <input class="mb-2 p-1 rounded" type="password" name="password" placeholder="Password" id="inputField">
            <input class="mb-2 p-1 rounded" type="password" name="verifyPassword" placeholder="Password" id="inputField">
            <input class="bg-gray-800 p-2 rounded" name="submit" type="submit" value="Register" id="submitWhite">
        </form>
    </div>
    <?php


    // Processing form data when form is submitted
    if (isset($_POST['submit'])) {
        $name= filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password']);
        $verifyPassword = filter_var($_POST['verifyPassword']);
        $team_name = filter_var($_POST['team_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty(trim($username)) && !empty(trim($password)) && !empty(trim($verifyPassword)) && !empty(trim($name)) && !empty(trim($team_name)) ) {
            if ($password === $verifyPassword) {
                $config = require_once('config.php');
                $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);

                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                $sql = "SELECT username FROM users WHERE username='$username'";
                if ($stmt = mysqli_prepare($link, $sql)) {
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            echo "Email is already taken!";
                        } else {

                            $create = "INSERT INTO users (name, username, password, team_name, admin, banned ) VALUES (?, ?, ?, ?, 0, 0)";

                            if ($stmtCreate = mysqli_prepare($link, $create)) {

                                // Set parameters
                                $param_name = $name;
                                $param_username = $username;
                                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                                $param_team_name = $team_name;

                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmtCreate, "ssss", $param_name, $param_username, $param_password, $param_team_name);

                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmtCreate)) {

                                    mysqli_stmt_close($stmtCreate);
                                    mysqli_stmt_close($stmt);
                                    header('location: login.php');
                                } else {
                                    echo mysqli_stmt_error($stmtCreate);
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
