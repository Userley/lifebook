<?php
$msj = "";
session_start();
if (!empty($_SESSION['active'])) {
    header('location: index.php');
} else {
    if (!empty($_POST)) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $msj = "Ingrese Usuario y contraseña";
        } else {
          include 'conex.php';
            $query = mysqli_query($Cn, "SELECT * from usuarios where user='" . $_POST['username'] . "' and pass='" . $_POST['password'] . "'");
            $Rs    = mysqli_num_rows($query);
            if ($Rs > 0) {
                $data               = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['iduser'] = $data['usuarioID'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['cargo']  = $data['cargo'];
                header('location:index.php');
                // echo utf8_encode($data['nombre']);
            } else {
                $msj = "Usuario o contraseña incorrectos";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador de vida</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>LifeBook</h1>
                  </div>
                  <p>Administre su vida de manera digital.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form action="" method="POST" class="form-validate">
                    <div class="form-group">
                      <input id="username" type="text" name="username"   data-msg="Por favor ingrese su usuario" class="input-material">
                      <label for="username" class="label-material">Usuario</label>
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" name="password"  data-msg="Por favor ingrese su clave" class="input-material">
                      <label for="password" class="label-material">Clave</label>
                    </div>
                    <div ><small class="text-danger"><?php echo $msj ?> </small></div><button id="login" type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#" class="forgot-pass">Olvidó Clave?</a><br><small>No tiene una cuenta? </small><a href="register.html" class="signup">Regístrate</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Diseñado por <a href="http://erickleyvad.000webhostapp.com/" class="external">Userley</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>
