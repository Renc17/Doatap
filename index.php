<html>

<head>
    <title>ΔΟΑΤΑΠ</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts.js"></script>
</head>

<body>
    <?php include("navbar.php"); ?>

    <div class="container-fluid" style="height:100vh;">
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
    </div>
</body>

</html>