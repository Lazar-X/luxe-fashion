<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="d-flex justify-content-md-end justify-content-center pt-3">
                    <?php
                        if(isset($_SESSION['user'])) {
                            echo '<li class="ml-3"><a href="../logic/logout.php"><i class="fa-solid fa-right-to-bracket"></i> Logout</a></li>';
                        }
                        else {
                            echo '<li class="ml-3"><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                            <li class="ml-3"><a href="register.php"><i class="fa-solid fa-right-to-bracket"></i> Register</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</header>