<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
?>
    <?php
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            if($user -> role_name == 'korisnik') {
                echo 'ovo je za korisnika';
            }
            // ovde else ako nije korisnik da ga redirektuje
            // ovde po meni ne mora, jer za korisnika cemo imati osnovne informacije koje i admin moze da promeni za sebe
        }
        // ovde else ako uopste nije ulogovan da ga redirektuje
    ?>
<?php
    require_once '../includes/footer.php';
?>