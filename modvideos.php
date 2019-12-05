<?php

session_start();
$Cn = mysqli_connect("sql201.eshost.com.ar", "eshos_23048472", "manson87", "eshos_23048472_lifeadmin") or die("Error de conexión");

if (!empty($_SESSION['active'])) {

    if (isset($_POST['cancelar'])) {
        header('location: videos.php');
    }

    if (isset($_POST['actualizar'])) {

        $nombre = $_POST['nomb'];
        $iddoc  = $_SESSION['iddoc'];

        $sql1 = "UPDATE videos  SET nombre='" . $nombre . "' WHERE idvideo='" . $iddoc . "'";
        $rs1  = mysqli_query($Cn, $sql1);

        $sql = "SELECT * from videos where idvideo='" . $_GET['nro'] . "'";

        $rs   = mysqli_query($Cn, $sql);
        $data = mysqli_fetch_array($rs);

    }

    $usuario = utf8_encode($_SESSION['nombre']);
    $cargo   = utf8_encode($_SESSION['cargo']);

    $_SESSION['iddoc'] = $_GET['nro'];
    $sql               = "SELECT * from videos where idvideo='" . $_GET['nro'] . "'";

    $rs   = mysqli_query($Cn, $sql);
    $data = mysqli_fetch_array($rs);

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


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/sweetalert/sweetalert2.all.min.js"></script>


    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    kkkk
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <body>
        <div class="page">
          <!-- Main Navbar-->
          <header class="header">
            <nav class="navbar">
              <!-- Search Box-->
              <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                  <input type="search" placeholder="What are you looking for..." class="form-control">
                </form>
              </div>
              <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                  <!-- Navbar Header-->
                  <div class="navbar-header">
                    <!-- Navbar Brand --><a href="index.php" class="navbar-brand d-none d-sm-inline-block">
                      <div class="brand-text d-none d-lg-inline-block"><span>Managed</span><strong> Life</strong></div>
                      <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>ML</strong></div></a>
                      <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                      <!-- Search-->
                      <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                      <!-- Notifications-->
                      <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                          <li><a rel="nofollow" href="#" class="dropdown-item">
                            <div class="notification">
                              <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                              <div class="notification-time"><small>4 minutes ago</small></div>
                            </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                              <div class="notification">
                                <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                <div class="notification-time"><small>4 minutes ago</small></div>
                              </div></a></li>
                              <li><a rel="nofollow" href="#" class="dropdown-item">
                                <div class="notification">
                                  <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                                  <div class="notification-time"><small>4 minutes ago</small></div>
                                </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                  <div class="notification">
                                    <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                    <div class="notification-time"><small>10 minutes ago</small></div>
                                  </div></a></li>
                                  <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                                </ul>
                              </li>
                              <!-- Messages                        -->
                              <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                  <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                      <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                                    </div></a></li>
                                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                      <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                      <div class="msg-body">
                                        <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                                      </div></a></li>
                                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                          <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                                        </div></a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                                      </ul>
                                    </li>
                                    <!-- Logout    -->
                                    <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Cerrar Sesión</span><i class="fa fa-sign-out"></i></a></li>
                                  </ul>
                                </div>
                              </div>
                            </nav>
                          </header>
                          <div class="page-content d-flex align-items-stretch">
                            <!-- Side Navbar -->
                            <nav class="side-navbar">
                              <!-- Sidebar Header-->
                              <div class="sidebar-header d-flex align-items-center">
                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                <div class="title">
                                  <h1 class="h4"><?php echo $usuario ?></h1>
                                  <p><?php echo $cargo ?></p>
                                </div>
                              </div>
                              <!-- Sidebar Navidation Menus--><span class="heading">Principal</span>
                              <ul class="list-unstyled">
                                <li ><a href="index.php"> <i class="icon-home"></i>Inicio </a></li>

                                <li><a href="#personal" aria-expanded="true" data-toggle="collapse"> <i class="fa fa-address-book-o"></i>Personal</a>
                                  <ul id="personal" class="uncollapse list-unstyled ">
                                    <li ><a href="documentos.php">Documentos</a></li>
                                    <li ><a href="imagenes.php">Imágenes</a></li>
                                    <li class="active"><a href="videos.php">Videos</a></li>
                                    <li><a href="frases.php">Frases</a></li>
                                  </ul>
                                </li>

                                <li><a href="#educacion" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-university"></i>Educación</a>
                                  <ul id="educacion" class="collapse list-unstyled ">
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                  </ul>
                                </li>

                                <li><a href="#trabajo" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-building-o"></i>Trabajo</a>
                                  <ul id="trabajo" class="collapse list-unstyled ">
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                  </ul>
                                </li>

                                <li><a href="#hogar" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-home"></i>Hogar</a>
                                  <ul id="hogar" class="collapse list-unstyled ">
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                  </ul>
                                </li>

                                <li><a href="#familia" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-heart"></i>Familia</a>
                                  <ul id="familia" class="collapse list-unstyled ">
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                  </ul>
                                </li>

                                <li><a href="#amigos" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-users"></i>Amigos</a>
                                  <ul id="amigos" class="collapse list-unstyled ">
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                  </ul>
                                </li>

                                <li><a href="#negocio" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-line-chart"></i>Negocio</a>
                                  <ul id="negocio" class="collapse list-unstyled ">
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Page</a></li>
                                  </ul>
                                </li>


                            </nav>
                            <div class="content-inner">
                              <!-- Page Header-->
                              <header class="page-header">
                                <div class="container-fluid">
                                  <h2 class="no-margin-bottom">Videos</h2>
                                </div>
                              </header>
                              <!-- Breadcrumb-->
                              <div class="breadcrumb-holder container-fluid">
                                <ul class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                  <li class="breadcrumb-item active">Videos</li>
                                </ul>
                              </div>
                              <!-- Forms Section-->
                              <section class="forms">
                                <div class="container-fluid">
                                  <div class="row">


                                    <!-- Form Elements -->
                                    <div class="col-lg-12">
                                      <div class="card">
                                        <div class="card-header d-flex align-items-center">
                                          <h3 class="h4">Modificar datos de videos</h3>
                                        </div>
                                        <div class="card-body">

                                          <form class="form-horizontal" action="" method="post" >
                                            <div class="form-group row">
                                              <label for="descrip" class="col-sm-3 form-control-label">Nombre</label>
                                              <div class="col-sm-8">
                                                <textarea class="form-control"  id="descrip" name="nomb" aria-label="With textarea"><?php echo $data[1]; ?></textarea>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="arch" class="col-sm-3 form-control-label">Link</label>
                                              <div class="col-sm-8">
                                                <label id="arch" class=" form-control-label"><?php echo $data[2]; ?></label>
                                              </div>
                                            </div>
                                         <div class="form-group row">
                                              <label for="fecha" class="col-sm-3 form-control-label">Modificación</label>
                                              <div class="col-sm-8">
                                                <label id="fecha" class=" form-control-label"><?php echo $data[3]; ?></label>
                                              </div>
                                            </div>
                                            <!--                        <div class="line"></div>-->
                                            <div class="form-group row">
                                              <div class="col-sm-4 offset-sm-3">
                                                <button type="submit"  name="actualizar" class="btn btn-success ">Actualizar datos</button>
                                               <button type="submit" name="cancelar" class="btn btn-secondary">Regresar</button>

                                              </div>
                                            </div>

                                            <div class="line"></div>

                                            <div class="col-lg-12">

                                            </div>

                                          </form>
<?php
if (isset($_POST['actualizar'])) {
    if ($rs1) {

        echo "<script type='text/javascript'>
              swal('¡Datos actualizados!','','success');
              </script>";
    }
}

?>



                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </section>
                              <!-- Page Footer-->
                              <footer class="main-footer">
                                <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <p>Userley Soft &copy; 2018-2019</p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                      <p>Diseñado por <a href="http://erickleyvad.000webhostapp.com/" class="external">Userley</a></p>
                                      <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                                    </div>
                                  </div>
                                </div>
                              </footer>
                            </div>
                          </div>
                        </div>


                        <!-- JavaScript files-->

                        <script src="vendor/popper.js/umd/popper.min.js"> </script>
                        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                        <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
                        <script src="vendor/chart.js/Chart.min.js"></script>
                        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>

                        <!-- Main File-->
                        <script src="js/front.js"></script>

                      </body>
                      </html>
