<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
?>
    <?php
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            if($user -> role_name == 'admin') {
                echo 'ovo je za admina';
            }
            // ovde else ako nije admin da ga redirektuje
        }
        // ovde else ako uopste nije ulogovan da ga redirektuje
    ?>
<?php
    require_once '../includes/services.php';
    require_once '../includes/footer.php';
?>