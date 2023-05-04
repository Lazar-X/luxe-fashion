<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if($user -> role_name == 'admin') {
            echo 'ovo je za admina';
        }
        else {
            echo '<div class="container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">Oops, it looks like you are not administrator!</h3>
                    </div>
                </div>
            </div>';
        }
    }
    else {
        echo '<div class="container">
            <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <h3 class="text-danger">Oops, it looks like you are not logged in!</h3>
                </div>
            </div>
        </div>';
    }
    require_once '../includes/footer.php';
?>