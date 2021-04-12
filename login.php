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
            <input class="mb-2 p-1 rounded text-gray-700" type="email" name="email" placeholder="Email">
            <input class="mb-2 p-1 rounded text-gray-700" type="password" name="password" placeholder="Password">
            <input class="bg-gray-800 p-2 rounded" type="submit" name="submit" value="Login">
        </form>
    </div>
</body>

</html>
<?php


// Processing form data when form is submitted
if (isset($_POST['submit'])) {
    $username = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password']);
    if (!empty(trim($username)) && !empty(trim($password))) {
        $config = require_once('config.php');
        $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);

        // Check connection
        if ($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "SELECT password, user_id, admin FROM users WHERE username='$username'";
        if ($stmt = mysqli_prepare($link, $sql)) {
            if (!(mysqli_stmt_execute($stmt))) {
                echo "<p>Error executing fetching password</p>";
                die(mysqli_error($link));
            }  //Fetches the password hash from Database
        }
        mysqli_stmt_bind_result($stmt, $passwordHash, $user_id, $admin);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_fetch($stmt);
        //Stores the password hash
        if (password_verify($password, $passwordHash)) {
            echo 'Password is valid!';
            $_SESSION["admin"] = $admin;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["loggedin"] = true;
            header('Location: index.php');
        } else {
            echo 'Invalid password.';
        }
        mysqli_close($link);
    } else {
        echo "<script>alert('Please fill in both username AND password');</script>";
    }
}
?>
