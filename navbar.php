<nav class="flex justify-center flex-wrap">
    <a href="index.php" class="nav-button">Livestream</a>
    <a href="bots.php" class="nav-button">Battlebots</a>
    <a href="games.php" class="nav-button">Games</a>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == 1) : ?>
    <a href="admin.php" class="nav-button">Admin</a>
    <?php endif ?>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
        <a href="account.php" class="nav-button">Account</a>
        <a href="logout.php" class="nav-button">Log out</a>
    <?php else : ?>
        <a href="login.php" class="nav-button">Log in</a>
        <a href="register.php" class="nav-button">Registration</a>
    <?php endif; ?>
</nav>
