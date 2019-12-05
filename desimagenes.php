<?php
session_start();

if (!empty($_SESSION['active'])) {
    $iddoc = $_GET['urlimg'];
    $nom   = $_GET['nom'];
    header("Content-disposition: attachment; filename=" . $nom);
    header("Content-type: image/jpeg");
    header("Content-type: image/gif");
    header("Content-type: image/bmp");
    readfile($iddoc);

} else {
    header('location: login.php');
}
