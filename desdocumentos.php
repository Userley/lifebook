<?php
session_start();

if (!empty($_SESSION['active'])) {
    $iddoc = $_GET['urldoc'];
    $nom   = $_GET['nom'];
    header("Content-disposition: attachment; filename=" . $nom);
    header("Content-type: text/plain");
    header("Content-type: application/pdf");
    header("Content-type: application/msword");
    header("Content-type: application/vnd.ms-excel");
    readfile($iddoc);

} else {
    header('location: login.php');
}
