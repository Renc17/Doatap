<?php

require('../../config.php');
require(BASE_URL . 'controllers\payment.php');
require(BASE_URL . 'helpers\middlewares\guard.php');
usersOnly();
$controller = new PaymentController($database);
$controller->create();
?>

<!DOCTYPE html>
<html lang="en">

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
        <title>Payment</title>

        <style>

            input[type="text"]{
                height: 30px;
                border-radius: 5px;
            }

            input[type="file"]{
                height: 90px;
                border-radius: 5px;
            }

            .radio-toolbar {
                margin-top: 20px;
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

            .error{
                color: red;
            }
            
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <form method='post' action='payment.php' class="validate" onsubmit="return CreditPayment()">
                <div class="d-flex flex-column">
                    <div class="col-12 d-flex flex-column mt-3">
                        <label for="card">Αριθμός κάρτας</label>
                        <input type="text" id="card" name="card" value="" placeholder="1234 1234 1234 1234" required>
                        <div class="error"> <?php echo $controller->getErrors('card')?> </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3 col-12">
                        <div class="d-flex flex-column col-6">
                            <label for="exp-date">Ημερομηνία λήξης</label>
                            <input type="text" id="exp-date" name="exp-date" value="" placeholder="MM/YY" required>
                            <div class="error"> <?php echo $controller->getErrors('exp-date') ?? '' ?> </div>
                        </div>
                        <div class="d-flex flex-column col-6">
                            <label for="cvv">CVC/CVV</label>
                            <input type="text" id="cvv" name="cvv" value="" placeholder="3ψηφιός" required>
                            <div class="error"> <?php echo $controller->getErrors('cvv') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-column mt-3 mb-2">
                        <label for="owner">Ον/μο στην κάρτα</label>
                        <input type="text" id="owner" name="owner" value="" placeholder="Ον/μο" required>
                        <div class="error"> <?php echo $controller->getErrors('owner') ?? '' ?> </div>
                    </div>
                    <button type="submit" name="payment" value="pay" class="btn btn-warning mt-5 col-12" >Πληρωμή</button>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="scripts/request.js"></script>
    </body>
</html>