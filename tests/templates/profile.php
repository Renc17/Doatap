<?php
    include './helpers/middlewares/roleGuard.php';
    session_start();
    usersOnly();
?>
<html>
    <body>
        <nav class="navbar navbar-expand-sm bg-light mb-4">
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="./helpers/auth/logout.php">Logout</a>
            </li>
            </ul>
        </nav>
        <h1>Welcome to the Account Page, <?php echo $_SESSION['name'] ?></h1>
    </body>
</html>