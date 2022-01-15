<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Doatap/index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Νομοθεσία</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Πληροφορίες
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ανακοινώσεις</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Επικοινωνία</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ο Οργανισμός</a>
                </li>
            </ul>
        </div>
        <form class="d-flex m-2">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="dropdown">
            <?php
            if(loggedInStatus()){?>
                <div class="btn-group dropstart">
                    <div class="btn-group dropstart" role="group">
                        <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu p-3 text-center" style="width: 250px;">
                            <li class="">
                                <a href="/Doatap/src/helpers/auth/logout.php" style="text-decoration: none; color: black">Έξοδος Λογαριασμού</a>
                            </li>
                            <hr>
                            <li class="">
                                <a href="/Doatap/src/helpers/auth/delete.php" class="btn-danger p-2" style="text-decoration: none; color: white" >Διαγραφή Λογαριασμού</a>
                            </li>
                        </ul>
                    </div>
                    <?php if ($_SESSION["role"] === "admin"){
                    ?>
                        <a class="btn btn-outline-success" href="/Doatap/src/views/dashboard.php"><span class="icon-menu" ><?php echo $_SESSION["name"];?></span></a>
                    <?php
                    }else{?>
                        <a class="btn btn-outline-success" href="/Doatap/src/views/profile.php"><span class="icon-menu" ><?php echo $_SESSION["name"];?></span></a>
                        <?php
                    }?>
                </div>
                <?php
            }else {?>
                <a class="btn btn-outline-success" href="/Doatap/src/views/login.php">Σύνδεση</a>
                <?php
            }
            ?>
        </div>

        
</nav>