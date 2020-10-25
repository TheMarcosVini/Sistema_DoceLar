<?php
session_start();
include('../../login/backend/verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Estoque</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
  <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
  <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- Custom CSS -->

  <link href="../dist/css/style.min.css" rel="stylesheet">
  <script type="text/javascript" src="../js/functions.js">

  </script>



  <style media="screen">

  #tudo{
    display: none;
    z-index: 100;
    background-color: black;
    width: 100%;
    height: 100%;
    position:fixed;
    opacity: 0.5;
    animation: fadein2 0.3s ease-in-out;
  }
  @keyframes fadein {
    from{
      opacity: 0%;
    }
    to{
      opacity: 100%;
    }
  }
  @keyframes fadein2 {
    from{
      opacity: 0%;
    }
    to{
      opacity: 50%;
    }
  }
  @keyframes fadeout {
    0%{
      opacity: 0%;
    }
    50%{
      opacity: 100%;
    }
    100%{
      opacity: 0%;
    }
  }
  #popup{
    top:50%; left:50%;
    position:absolute;
    transform: translate(-50%, -50%);
    display: none;
    background-color: #f9fbfd;
    z-index: 101;
    animation: fadein 0.3s ease-in-out;
  }
  </style>
</head>
<body>
  <div id="tudo" class="tudo"></div>


  <div id="tudo" class="tudo"></div>

  <div class="popup page-wrapper" id="popup" style="display:none;">
    <div align="center" id="popup2" class="container" style="display:none;">
      <br>
      <div class>
        <input type="text" name="" id="confirmer" style="display:none;" value="2">
        <p style="color:red; position:fixed; margin-left: 80%;cursor:pointer;" onclick="closeThis()" >X</p>
        <p>Retirar</p>


      </div>
      <div class="input-group">
        <input type="text" class="form-control" name="qtd" id="qtd" placeholder="Quantidade">
        <button style="float:right;" id="retMat" type="button" class="btn waves-effect waves-light btn-outline-success">-></button>
      </div>
      <br>
      <br>

    </div>
  </div>

  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <!-- ============================================================== -->
  <!-- Topbar header - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
      <div class="navbar-header" data-logobg="skin6">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
          class="ti-menu ti-close"></i></a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-brand">
            <!-- Logo icon -->
            <a href="index.php">
              <img src="../assets/images/logo.png" width="150"></img>
            </a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
          data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
          class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
            <!-- Notification -->
            <!-- End Notification -->
            <!-- ============================================================== -->
            <!-- create new -->
            <!-- ============================================================== -->
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <?php
            require "search.php";
            ?>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <?php
            require "profile.php";
            ?>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>


    <?php
    require "menu.php";
    ?>


    <div class="page-wrapper" style="display: block;">
      <div class="page-breadcrumb">

        <div class="row">
          <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Listagem de Estoque</h4>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                  <li class="breadcrumb-item text-muted active" aria-current="page">Listagem Estoque</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <?php if(isset($_SESSION['Erro'])): ?>
        <div class="col-md-4" style="left:50%; z-index:200;transform: translate(-50%);"  >
          <div class="card text-white bg-danger">
            <div class="card-header">
              <h4 class="mb-0 text-white">Erro - Numero de retirada maior que estoque</h4>
            </div>
          </div>
        </div>
        <?php
      endif;
      unset($_SESSION['Erro']);
      ?>

      <div class="page-breadcrumb">
        <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered no-wrap">
            <thead>
              <tr>
                <th class="col-md">Material</th>
                <th>Quantidade</th>
                <th>Excluir</th>
                <th>Retirar</th>
              </tr>
            </thead>
            <tbody>
              <?php require('../backend/lista_estoque.php') ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
  </body>
  </html>
