<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand col-1" href="/Doatap/index.php"><img style="object-fit:contain; width:100%" src="/Doatap/images/logo2.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ανακοινώσεις</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Doatap/src/views/contact.php">Επικοινωνία</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Doatap/src/views/faq.php">FAQ</a>
                </li>
            </ul>
        </div>
        <button class="btn ">ΕΛ</button>
        <div class="dropdown">
            <?php
            if(loggedInStatus()){?>
                <div class="btn-group dropstart">
                    <div class="btn-group dropstart" role="group">
                        <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu p-3 text-center" style="width: 250px;">
                            <li class="text-start nav-options">
                                <button onclick="toggleEdit()" class ="btn">Edit Profile</button>
                            </li>
                            <li class="text-start nav-options">
                                <button class ="btn"><a href="/Doatap/src/views/requests.php" style="text-decoration: none; color: black" >Οι Αιτήσεις μου</a></button>
                            </li>
                            <li class="text-start nav-options">
                                <button class="btn"><a href="/Doatap/src/helpers/auth/delete.php" style="text-decoration: none; color: black" >Διαγραφή Λογαριασμού</a></button>
                            </li>
                            <hr>
                            <li class="text-start nav-options">
                                <button class="btn"><a href="/Doatap/src/helpers/auth/logout.php" style="text-decoration: none; color: black">Έξοδος</a></button>
                                
                            </li>
                        </ul>
                    </div>
                    <?php if ($_SESSION["role"] === "admin"){
                    ?>
                        <a class="btn sgn" href="/Doatap/src/views/dashboard.php"><span class="icon-menu" ><?php echo $_SESSION["name"];?></span></a>
                    <?php
                    }else{?>
                        <a class="btn sgn" href="/Doatap/src/views/profile.php"><span class="icon-menu" ><?php echo $_SESSION["name"];?></span></a>
                        <?php
                    }?>
                </div>
                <?php
            }else {?>
                <a class="btn sgn" href="/Doatap/src/views/login.php">Σύνδεση</a>
                <?php
            }
            ?>
        </div>

        
</nav>