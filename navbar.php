<nav class="flex justify-center flex-wrap">
        <a href="index.php" class="nav-button">Livestream</a>
        <a href="bots.php" class="nav-button">Battlebots</a>
        <a href="games.php" class="nav-button">Games</a>
        <a href="admin.php" class="nav-button">Admin</a>
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ){
            echo'<a href="account.php" class="nav-button">Account</a>';
            echo'<a href="logout.php" class="nav-button">Log out</a>';
        }else{
            echo'<a href="login.php" class="nav-button">Log in</a>';
            echo'<a href="register.php" class="nav-button">Registration</a>';
        }
        ?>
        
    </nav>