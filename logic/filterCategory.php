<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {}
    // $idKat = $_POST['idKat'];

    if($idKat == '0') {
        $proizvodi = vratiSveProizvodeSaKategorijom();
    }
    else {
        $proizvodi = vratiSveProizvodeSaIdKategorijom($idKat);
        $response = $proizvodi;
    }
?>