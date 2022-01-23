<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand col-1" href="/Doatap/index.php"><img style="object-fit:contain; width:100%" src="/Doatap/src/assets/images/logo2.png" alt="Doatap"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Αίτηση Αναγνώρισης</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Doatap/src/views/faq.php">Οδηγός</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Doatap/src/views/contact.php">Επικοινωνία</a>
                </li>
            </ul>
        </div>
        <button class="btn ">ΕΛ</button>
        <div class="dropdown">
            <?php
            if(loggedInStatus()){?>
                <div class="btn-group dropstart">
                    <div class="btn-group dropstart" role="group">
                        <button type="button" value="text" class="btn dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid #0071bc;"><i style="font-size:x-small" class="bi bi-chevron-left"></i></button>
                        <ul class="dropdown-menu p-3" style="width: 250px;">
                            
                        <?php if ($_SESSION["role"] === "user"){ ?>
                            <!-- <button class="btn text-start nav-options col-12" onclick="toggleEdit()" ><li >Edit Profile</li></button> -->
                            <li ><a href="/Doatap/src/views/new-request.php" style="text-decoration: none; color: black" ><button class="btn text-start nav-options col-12">Νέα Αίτηση</button></a></li>
                            <li ><a href="/Doatap/src/views/requests.php" style="text-decoration: none; color: black" ><button class="btn text-start nav-options col-12">Οι Αιτήσεις μου</button></a></li>
                            <li ><div id="user-id" name="<?php echo $_SESSION["id"];?>" style="text-decoration: none; color: black" ><button class="btn text-start nav-options col-12" onclick="alertDeleteUser()">Διαγραφή Λογαριασμού</button></div></li>
                            <hr>
                        <?php } ?>
                            <li ><a href="/Doatap/src/helpers/auth/logout.php" style="text-decoration: none; color: black"><button class="btn text-start nav-options col-12">Έξοδος</button></a></li>
                                
                            
                        </ul>
                    </div>
                    <?php if ($_SESSION["role"] === "admin"){
                    ?>
                        <a class="btn sgn" href="/Doatap/src/views/dashboard.php"><span class="icon-menu" ><?php echo $_SESSION["name"];?></span></a>
                    <?php
                    }else{?>
                        <a class="btn" href="/Doatap/src/views/profile.php" style="border: 1px solid #0071bc"><span class="icon-menu" ><?php echo $_SESSION["name"];?></span></a>
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
    </div>
    <script type="text/javascript" src="../views/scripts/alerts.js"></script>
</nav>