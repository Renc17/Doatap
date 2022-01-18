<?php
    require('../../config.php');
    require(BASE_URL. 'helpers\middlewares\guard.php');
    usersOnly();
    require(BASE_URL. 'controllers\users.php');
    $controller =  new UserController($database);
    $controller->editUser();

    $logout_path = '..\helpers\auth\logout.php';
    $delete_path = '..\helpers\auth\delete.php';

    require(BASE_URL. 'controllers\forms.php');
    $formController =  new FormController($database);
    $drafts = $formController->getFormsByStatus('drafted');
    $submitted = $formController->getFormsByStatus('submitted');

    $formPreview = $formController->getFormPreview(15);   // for form preview view
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../scripts.js"></script>

        <title>Προφίλ</title>

        <style>
            input[type="text"]{
                height: 30px;
                border-radius: 5px;
            }
            button.edit-user{
                border: none;
            }

            a.btn{
                border: 1px solid rgba(0, 0, 0, 0.3);
                border-radius: 10px;
                width: 100%;
            }

            .breadcrumb-item a{
                text-decoration: none;
            }

            .breadcrumb-item.active{
                font-weight: bold;
            }

            a.btn:hover{
                color: #0d6efd;
            }

        </style>
    </head>

    <body>

        <?php 
            include(BASE_URL. 'includes\navbar.php'); 
        ?>
        
        <div class="container mt-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/index.php">Αρχική</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Προφίλ</li>
                </ol>
            </nav>
        </div>
        
        

        <div class="container col-md-5 col-sm-12 mb-5" >
            <div class="d-flex flex-row justify-content-between">
                <div class="user-data d-flex flex-row">
                    <h2 class="name m-1">
                        <?php echo $_SESSION['name']; ?>
                    </h2>
                    <h2 class="surname m-1">
                        <?php echo $_SESSION['surname']; ?>
                    </h2>
                </div>
                <div class="edit-btn d-flex align-items-center">
                    <div>
                        <button onclick="toggleEdit()" class="edit-user" type="submit" name="edit" value='update'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div id="details" class="details text-black-50 mt-4">
                <h6 class="AFM m-1">
                    ΑΦΜ: <?php echo $_SESSION['AFM']; ?>
                </h6>
                <h6 class="AMKA m-1">
                    ΑΜΚΑ: <?php echo $_SESSION['AMKA']; ?>
                </h6>
                <h6 class="cel m-1">
                    Τηλ: <?php echo $_SESSION['cel']; ?>
                </h6>
                <h6 class="email m-1">
                    Email: <?php echo $_SESSION['email']; ?>
                </h6>
            </div>

            <form id="form" method='post' action='profile.php' class="mt-4" style="display: none;">
                <div class="text-black-50">
                    <h6 class="AFM d-flex align-items-center m-1 col-md-4">
                        <label>ΑΦΜ</label>
                        <input class="ms-3" type="text" name="AFM" value="<?php echo $_SESSION['AFM'] ?>" placeholder="<?php echo $_SESSION['AFM'] ?>" class="text-input" >
                        <div class="error"> <?php echo $controller->getErrors('AFM') ?? '' ?> </div>
                    </h6>
                    <h6 class="AMKA d-flex align-items-center m-1 col-md-4">
                        <label>ΑΜΚΑ</label>
                        <input class="ms-3" type="text" name="AMKA" value="<?php echo $_SESSION['AMKA'] ?>" placeholder="<?php echo $_SESSION['AMKA'] ?>" class="text-input" >
                        <div class="error"> <?php echo $controller->getErrors('AMKA') ?? '' ?> </div>
                    </h6>
                    <h6 class="cel d-flex align-items-center m-1 col-md-4">
                        <label>Τηλ</label>
                        <input class="ms-3" type="text" name="cel" value="<?php echo $_SESSION['cel'] ?>" placeholder="<?php echo $_SESSION['cel'] ?>" class="text-input" >
                        <div class="error"> <?php echo $controller->getErrors('cel') ?? '' ?> </div>
                    </h6>
                </div>
                <button class = 'btn border border-3 rounded-pill float-end' type="submit" name="edit" value='update' class="submit">Ανανέωση</button>
                <button onclick="toggleEdit()" class = 'btn float-end text-black-50'>Ακυρο</button>
            </form>
            <hr class="mt-5" style="border: 3px solid black;">

            <div class="d-flex flex-row justify-content-between p-3">
                <div class="col-md-5">
                    <a class="btn" href="new-request.php">Νέα Αίτηση</a>
                </div>
                <div class="col-md-5">
                    <a class="btn" href="requests.php">Οι Αιτήσεις μου</a>
                </div>
            </div>
        </div>
        
        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
        <script type="text/javascript" src="scripts/edit.js"></script>
    </body>
</html>
