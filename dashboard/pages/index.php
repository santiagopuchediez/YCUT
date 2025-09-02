<!DOCTYPE html>
<html lang="es">
<?php
session_start();

if(isset($_SESSION['user'])){
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="../../IMG/logo.png">
  <title>
    YCUT
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../../CSS/estilos.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="index.php">
        <img src="../../IMG/logo.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">YCUT</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active bg-gradient-dark text-white" href="./index.php?mod=inicio">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?mod=perfilusuario">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Tú Perfil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="./index.php?mod=reportar.php">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Reportar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?mod=reportesver">
            <i class="material-symbols-rounded opacity-5">format_textdirection_r_to_l</i>
            <span class="nav-link-text ms-1">Ver reportes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?mod=mapadecalor">
            <i class="material-symbols-rounded opacity-5">notifications</i>
            <span class="nav-link-text ms-1">Mapa de Calor</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Administra Usuarios</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="./index.php?mod=crear_usuarios">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Crear Usuario</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="./index.php?mod=gestionar_usuarios">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Gestionar Usuario</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Inventario</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="./index.php?mod=inventario">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Ver Inventario</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?mod=adminv">
            <i class="material-symbols-rounded opacity-5">view_in_ar</i>
            <span class="nav-link-text ms-1">Agregar al Inventario</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Administra tu Cuenta</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../../exit.php">
            <i class="material-symbols-rounded opacity-5">login</i>
            <span class="nav-link-text ms-1">Cerrar sesión</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?mod=contactenos">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Contectatenos</span>
          </a>
        </li>
      </ul>
      
    </div>
    
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Páginas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo $_SESSION['nom'], " ", $_SESSION['ape']; ?></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav d-flex align-items-center  justify-content-end">
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <?php 
      if(@ $_GET['mod'] == ""){
        require_once("../modulos/inicio.php");
      }else if(@ $_GET['mod'] == "inicio"){
        require_once("../modulos/inicio.php");
      } else if(@ $_GET['mod'] == "crear_usuarios"){
        require_once("../modulos/crear_usuario.php");
      } else if(@ $_GET['mod'] == "gestionar_usuarios"){
        require_once("../modulos/gestionar_usuarios.php");
      } else if(@ $_GET['mod'] == "reportar.php"){
        require_once("../modulos/reportar.php");
      }else if(@ $_GET['mod'] == "inventario"){
        require_once("../modulos/inventario.php");
      }else if(@ $_GET['mod'] == "adminv"){
        require_once("../modulos/adminv.php");
      }else if(@ $_GET['mod'] == "contactenos"){
        require_once("../modulos/contactenos.php");
      }else if(@ $_GET['mod'] == "perfilusuario"){
        require_once("../modulos/perfilusuario.php");
      }else if(@ $_GET['mod'] == "reportesver"){
        require_once("../modulos/reportesver.php");
      }else if(@ $_GET['mod'] == "mapadecalor"){
        require_once("../modulos/mapadecalor.php");
      }
      
      ?>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>
<?php
}else{
    echo "<script>window.location='../../index.php';</script>";
}
?>