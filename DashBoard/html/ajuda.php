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
  <script src="../js/functions.js">

  </script>
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
        <div class="col-md-12 " align="center" >
          <p>Olá, seja bem-vindo(a) ao sistema BRIDGE©, sistema criado unicamente para uso da empresa DoceLar - Móveis Planejados</p>
          <p>Logo abaixo você pode encontrar atalhos para cada operação do Sistema</p>
          <div class="col-md-6 m-auto">

            <select class="form-control" name="" onchange="abrirSecao(this.value)">
              <option value="#">Opções para Cadastros</option>
              <option value="cad_cliente.php" >Cadastro de Clientes</option>
              <option value="cad_funcionario.php" >Cadastro de Funcionários</option>
              <option value="cad_fornecedor.php" >Cadastro de Fornecedores</option>
              <option value="cad_materiais.php" >Cadastro de Materias</option>
              <option value="cad_materiais.php"  >Cadastro de Classe</option>
            </select>
            <br>
            <select class="form-control" name="" align onchange="abrirSecao(this.value)">
              <option value="">Orçamentos</option>
              <option value="orcamento.php">Novo</option>
              <option value="exib_orcamento.php">Já criados</option>
            </select>
            <br>
            <select class="form-control" name="" align onchange="abrirSecao(this.value)">
              <option value="">Financeiro</option>
              <option  >A pagar</option>
              <option  >A receber</option>
            </select>
            <br>
            <select class="form-control" name="" align onchange="abrirSecao(this.value)">
              <option value="">Material</option>
              <option value="inser_materiais.php" >Inserir</option>
              <option value="#" >Retirar</option>
              <option value="list_estoque.php" >Estoque</option>
            </select>
            <br>
            <select class="form-control" name="" align onchange="abrirSecao(this.value)">
              <option value="">Consulta</option>
              <option value="list_cliente.php" >Clientes</option>
              <option value="list_funcionario.php">Funcionários</option>
              <option value="list_fornecedor.php">Fornecedores</option>
              <option value="list_materiais.php">Materias</option>
            </select>
            <br>
            <button onclick="abrirSecao(this.value)" type="button" name="" class="form-control" value="sobre.php" >Sobre</button>
          </div>
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
