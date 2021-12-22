<?php
    include './helpers/middlewares/roleGuard.php';
    session_start();
    #adminOnly();
    usersOnly();  # if it's user profile 
?>
<html>
    <body>
        <nav class="navbar navbar-expand-sm bg-light mb-4">
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="./helpers/auth/logout.php">Logout</a>
            <a class="nav-link" href="./helpers/auth/delete.php">DELETE ACCOUNT</a>
            </li>
            </ul>
        </nav>
        <h1>Welcome to the Account Page, <?php echo $_SESSION['name']; echo ($_SESSION['role']); ?></h1>
    </body>
</html>