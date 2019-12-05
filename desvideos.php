<?php
session_start();

if (!empty($_SESSION['active'])) {
    $iddoc = $_GET['urlvdo'];
    $nom   = $_GET['nom'];
    header("Content-disposition: attachment; filename=" . $nom);
    header("Content-type: video/mp4");
    header("Content-type: video/x-msvideo");
    header("Content-type: video/quicktime");
    header("Content-type: video/mpeg");
    header("Content-type: video/mpeg");
    readfile($iddoc);

} else {
    header('location: login.php');
}
