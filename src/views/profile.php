<?php
    require('../../config.php');
    require(BASE_URL. '\src\helpers\middlewares\guard.php');
    #adminOnly();
    usersOnly();  # if it's user profile 
    require(BASE_URL.'\src\controllers\users.php');
    $controller =  new UserController();
    $controller->editUser();

    $logout_path = '..\helpers\auth\logout.php';
    $delete_path = '..\helpers\auth\delete.php';
?>
<html>
    <body>
        <nav class="navbar navbar-expand-sm bg-light mb-4">
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="<?php echo $logout_path ?>">Logout</a>
            <br>
            <a class="nav-link" href="<?php echo $delete_path ?>">DELETE ACCOUNT</a>
            </li>
            </ul>
        </nav>
        
        <form method='post' action='profile.php'>
                <h2 class="form-title">
                    <?php echo $_SESSION['name']; ?>
                </h2>
                <div>
                    <label>AFM</label>
                    <input type="text" name="AFM" value="<?php echo $controller->getAFM(); ?>" placeholder="<?php echo $_SESSION['AFM'] ?>" class="text-input" >
                    <div class="error"> <?php echo $controller->getErrors('AFM') ?? '' ?> </div>
                </div>
                <div>
                    <label>AMKA</label>
                    <input type="text" name="AMKA" value="<?php echo $controller->getAMKA(); ?>" placeholder="<?php echo $_SESSION['AMKA'] ?>" class="text-input" >
                    <div class="error"> <?php echo $controller->getErrors('AMKA') ?? '' ?> </div>
                </div>
                <div>
                    <label>Cel</label>
                    <input type="text" name="cel" value="<?php echo $controller->getCel(); ?>" placeholder="<?php echo $_SESSION['cel'] ?>" class="text-input" >
                    <div class="error"> <?php echo $controller->getErrors('cel') ?? '' ?> </div>
                </div>
                <button class = 'btn btn-outline-info' type="submit" name="edit" value='update' class="submit">Update</button>
            </form> 
    </body>
</html>