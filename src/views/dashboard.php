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
    $rejected = $formController->allFormsByStatus('rejected');
?>
<!DOCTYPE html>
<html lang="el">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../style.css">

        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../scripts.js"></script>

        <title>Προφίλ</title>

        <style>
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

        </style>
    </head>

    <body>

        <?php 
            include(BASE_URL. 'includes\navbar.php'); 
        ?>
        
        <div class="container mt-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap//index.php">Αρχική</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>


        <div class="container col-md-5 col-sm-12 mb-5" >
            <div class="d-flex flex-row justify-content-between">
                <div class="user-data d-flex flex-row">
                    <h2 class="name m-1">
                        <?php echo $_SESSION['name']; ?>
                    </h2>
                </div>
            </div>
            <hr class="mt-5" style="border: 3px solid black; opacity: 1;">
        </div>

        <div class="container">
            
        </div>
        
        

        <div class="container">
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="Submitted-tab" data-bs-toggle="tab" data-bs-target="#Submitted" type="button" role="tab" aria-controls="Submitted" aria-selected="true">Υποβλήθηκε</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="checked-tab" data-bs-toggle="tab" data-bs-target="#checked" type="button" role="tab" aria-controls="checked" aria-selected="false">Ελεγμένα</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" style="color: red;" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Απορρίφθηκε</button>
                    </li>
                </ul>
            </div>
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Submitted" role="tabpanel" aria-labelledby="Submitted-tab">
                
                    <div class="row justify-content-start mt-5">
                        <?php 
                        if(empty($submitted)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν νέες υποβολές </h5> <?php 
                        } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Κυκλος Σπουδων</th>
                                    <th scope="col">Ον/μο</th>
                                    <th scope="col">Δημιουργήθηκε</th>
                                    <th scope="col">Επισκόπηση</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($submitted as $form){ ?>
                                    <tr>
                                        <th scope="row"><?php echo $form[0] ?></th>
                                        <td><?php echo $form[15] ?></td>
                                        <td><?php echo $form[1] .' ' .$form[2]  ?></td>
                                        <td><?php echo $form[22] ?></td>
                                        <td><a href="/Doatap/src/views/preview.php?id=<?php echo $form[26] ?>" class="btn">Ανάγνωση</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="checked" role="tabpanel" aria-labelledby="checked-tab">
                    <div class="row justify-content-start mt-5">
                    <?php 
                        if(empty($forms)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν ελεγμένες αιτήσεις </h5> <?php 
                        } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Κυκλος Σπουδων</th>
                                    <th scope="col">Ον/μο</th>
                                    <th scope="col">Δημιουργήθηκε</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Επισκόπηση</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($forms as $form){ ?>
                                    <tr>
                                        <th scope="row"><?php echo $form[0] ?></th>
                                        <td><?php echo $form[15] ?></td>
                                        <td><?php echo $form[1] .' ' .$form[2]  ?></td>
                                        <td><?php echo $form[22] ?></td>
                                        <td><?php echo $form[23] ?></td>
                                        <td><a href="/Doatap/src/views/preview.php?id=<?php echo $form[26] ?>" class="btn">Ανάγνωση</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                    <div class="row justify-content-start mt-5">
                    <?php 
                        if(empty($rejected)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν αιτήσεις </h5> <?php 
                        } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Κυκλος Σπουδων</th>
                                    <th scope="col">Ον/μο</th>
                                    <th scope="col">Δημιουργήθηκε</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Επισκόπηση</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($rejected as $form){ ?>
                                    <tr>
                                        <th scope="row"><?php echo $form[0] ?></th>
                                        <td><?php echo $form[15] ?></td>
                                        <td><?php echo $form[1] .' ' .$form[2]  ?></td>
                                        <td><?php echo $form[22] ?></td>
                                        <td><?php echo $form[23] ?></td>
                                        <td><a href="/Doatap/src/views/preview.php?id=<?php echo $form[26] ?>" class="btn">Ανάγνωση</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
       

        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
    </body>
</html>