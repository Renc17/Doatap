<html>

<head>
    <title>ΔΟΑΤΑΠ</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts.js"></script>
</head>

<body>
    <?php 
        require('config.php');
        include(BASE_URL. '\src\includes\navbar.php'); 
    ?>

    <div class="container" style="height:100vh;">
        <div id="eonly" class="alert-box">
            <div class="alert alert-danger alert-container d-flex" role="alert">
                <p class="col-11">Το Πρωτόκολλο του ΔΟΑΤΑΠ δέχεται έγγραφα ΜΟΝΟ δια ηλεκτρονικού ταχυδρομείου (protocol@doatap.gr), ΕΛΤΑ και ταχυμεταφορών.</p>
                <button type="button" class="btn-close col-1 justify-content-end" aria-label="Close" onclick="hideElement('eonly')"></button>
            </div>
        </div>

        <div id="isonomia" class="alert-box">
            <div class="alert alert-danger alert-container d-flex" role="alert">
                <p class="col-11">Για λόγους ισονομίας και ίσης μεταχείρισης των αιτόυντων, η σειρά προτεραιότητας δεν παραβιάζεται. Η διοίκηση απορρίπτει Αιτήματα υπέρβασης σειράς προτεραιότητας με το παραπάνω σκεπτικό. Μόνον όταν υπάρχει πέραν του συνήθους αδικαιολόγητη καθυστέρηση εκ μέρους του οργανισμού δίνεται έγκριση επίσπευσης </p>
                <button type="button" class="btn-close col-1 justify-content-end" aria-label="Close" onclick="hideElement('isonomia')"></button>
            </div>
        </div>
        <div class="d-flex justify-content-center m-2">
            <h1 style="color: #77B6EA; ">Οδηγός για την Αναγνώριση Πτυχίων</h1>
        </div>
        <div class="row p-4">
            <div class="d-flex col-5 justify-content-end">
                <img style="object-fit:contain;" src="images/homepage.png" alt="Italian Trulli">
            </div>
            <div class="col-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <hr class="minehr" />
        <div class="d-flex justify-content-center col-10">
            <ul class="list-display">
                <li class="qna">Συχνές Ερωτήσεις</li>
                <li class="qna">Παράβολα</li>
                <li class="qna">Η Πορεία μιας Αίτησης</li>
                <li class="qna">Αιτήματα Φορέων για Επιβεβαίωση Γνησιότητας Πράξεων Αναγνώρισης</li>
                <li class="qna">Φόρμες Αιτήσεων</li>
            </ul>
        </div>
        <hr class="minehr" />
    </div>

    <?php include(BASE_URL. '\src\includes\footer.php');  ?>
</body>

</html>