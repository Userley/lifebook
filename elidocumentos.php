<?php
session_start();
$Cn = mysqli_connect("sql201.eshost.com.ar", "eshos_23048472", "manson87", "eshos_23048472_lifeadmin") or die("Error de conexión");

if (!empty($_SESSION['active'])) {

} else {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LifeBook - Digitaliza tu vida.</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="css/fontastic.css">
  <!-- Google fonts - Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/sweetalert/sweetalert2.all.min.js"></script>


    <script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>

              <?php
$iddoc = $_GET['nro'];
$rta   = $_GET['rta'];
$sql1  = "DELETE from documentos where iddocumento='" . $iddoc . "'";
$rs1   = mysqli_query($Cn, $sql1);

if ($rs1) {
    unlink($rta);
    echo "<script type='text/javascript'>

      window.location.href = 'documentos.php';
              </script>";
}

?>


</body>
</html>
