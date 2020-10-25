<?php
session_start();
include('../../login/backend/verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sistema - BRIDGE</title>
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
</head>
<body>

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


      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div align="center" >
              <p>Esse sitema foi criado exclusivamente para o uso comercial da empresa DoceLar©</p>
              <p>Esse sistema possui vários recursos e funcionalidades, como o controle de gastos,</p>
              <p>materiais em estoque, cadastro de clientes e funcionários,</p>
              <p>gerar relatórios sobre sua empresa entre muitos outros.</p>

              <p><a href="https://docelarmarcenaria.com.br/" target="_blank" style="text-decoration:none;">https://docelarmarcenaria.com.br/</a></p>
              <div style="display: flex; justify-content: center;">
                <p>Versão: Beta</p>&emsp;<p>Oferecido Por: Dial_UP</p>
              </div>
              <div style="display: flex; justify-content: center;">
                <p>Liberado em: 26/10/2020</p>&emsp;<p>SUPORTED</p>
              </div>
              <p>Contato ao criador: dialup_inc@hotmail.com</p>
              <p>Brasil - SP - HT</p>
            </div>
          </div>
        </div>
      </div>


        <footer align="center" style="font-size:14px;">
          <p><b>© 2020 Dial_UP. All rights reserved</b></p>
        </footer>
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
