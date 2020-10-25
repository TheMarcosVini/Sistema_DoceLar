<!DOCTYPE html>
<?php
session_start();
include('../../login/backend/verifica_login.php');
?>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Inserir Materiais</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
  <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../dist/css/style.min.css" rel="stylesheet">
  <script src="../js/functions.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body >

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
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cadastrar Materiais</h4>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                  <li class="breadcrumb-item text-muted active" aria-current="page">Cadastro Materiais</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <select id="optionsOK" style="display:none;">
        <?php require("../backend/order_mat.php")?>
      </select>
      <div class="container-fluid">
        <form action="../backend/res_insere_mat.php" method="POST">
          <div class="table-responsive-sm">
            <table id= "tabs"  class="table">
              <thead>
                <tr>
                  <th scope="col" >Materiais</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Tamanho(cm)</th>
                  <th scope="col">Valor/UN</th>
                  <th scope="col">SubTotal</th>
                  <th scope="col">Data Compra</th>
                  <th scope="col">Deletar</th>
                </tr>
              </thead>
              <tbody id ="table">
              </tbody>
              <tfoot>
                <th scope="col">Total(R$):</th>
                <th scope="col"><input type="number"  disabled class="form-control" name="total" id="total" value="0" placeholder=""></th>
              </tfoot>
            </table>
          </div>

          <div class="row" style="justify-content: center;">
            <div class="col-md-12">
              <button style="float:right;" type="submit" class="btn waves-effect waves-light btn-outline-success">Cadastrar</button>

              <button style="float:left;" type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="addRow();">Adicionar Material</button>
              <input type="text" id="cont" name="cont" style="display:none;" >
            </div>
          </form>
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

      <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
      <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
      <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
    </body>
    </html>
