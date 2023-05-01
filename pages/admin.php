<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin stranica</title>
</head>
<body>
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
</body>
</html>