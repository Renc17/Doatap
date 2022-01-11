<?php
    require('../../config.php');
    require(BASE_URL. 'helpers\middlewares\guard.php');
    adminOnly();
    require(BASE_URL. 'controllers\users.php');
    $controller =  new UserController($database);
    $controller->editUser();

    $logout_path = '..\helpers\auth\logout.php';
    $delete_path = '..\helpers\auth\delete.php';

    require(BASE_URL. 'controllers\forms.php');
    $formController =  new FormController($database);
    $forms = $formController->allFormsByStatus('checked');
    $submitted = $formController->allFormsByStatus('submitted');
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
        
        <h2 class="form-title">
            <?php echo $_SESSION['name']; ?>
        </h2>

        <!-- <?php
            foreach($forms as $form){
                print_r($form);
            }
        ?> -->

        <?php
            foreach($submitted as $form){
                print_r($form);
            }
        ?>

    </body>
</html>