<!DOCTYPE html>
<?php
session_start();
include('../../login/backend/verifica_login.php');
?>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Contas a pagar</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js" integrity="sha512-AtJGnumoR/L4JbSw/HzZxkPbfr+XiXYxoEPBsP6Q+kNo9zh4gyrvg25eK2eSsp1VAEAP1XsMf2M984pK/geNXw==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js" integrity="sha512-XmZS54be9JGMZjf+zk61JZaLZyjTRgs41JLSmx5QlIP5F+sSGIyzD2eJyxD4K6kGGr7AsVhaitzZ2WTfzpsQzg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
  <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
  <script src="jspdf.plugin.autotable.min.js"></script>
  <script src="../js/functions.js"></script>
  <script src="../js/relatContasPag.js"></script>
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
  #sucesso{
    width:30%;
    top:15%; left:50%;
    position:fixed;
    transform: translate(-50%, -90%);
    display: block;
    z-index: 102;
  }
  </style>
</head>
<body>
  <div id="tudo" class="tudo"></div>
  <div id="sucesso" class="alert alert-success alert-dismissible bg-success text-white border-0 fade " role="alert">
    <strong>Sucesso - </strong> Conta Adicionada
  </div>

  <div class="popup page-wrapper" id="popup" style="display:none;">
    <div align="center" id="popup2" class="container" style="display:none;">

      <br>
      <p style="color:red; position:fixed; margin-left: 85%;cursor:pointer;" onclick="closeThis()" >X</p>
      <p>Adicionar Um Conta</p>
      <select  type="text" class="form-control" name="tipo" id="tipo" placeholder="tipo">
        <option value="" selected>Tipo de Conta</option>
        <option value="Luz">Luz</option>
        <option value="Água">Água</option>
        <option value="Material">Material</option>
        <option value="Material">Outro</option>
      </select>
      <br>
      <input type="text" class="form-control" name="valor_conta" id="valor_conta" placeholder="Valor da Conta">
      <br>
      <div class="row m-auto" >
        <input type="date" class="form-control col-md-6" name="dataCompra" id="dataCompra" placeholder="Data Inicial" style="float:left;">
        <input type="date" class="form-control col-md-6" name="dataFinal" id="dataFinal" placeholder="Data Pagamento" style="float:right;">
      </div>
      Descrição: <textarea style="resize: none;" class="form-control" name="desc" id="desc" rows="4" cols="10"></textarea>
      <br>
      <button style="float:right;" id="animar" onclick="verifica()" type="button" class="btn waves-effect waves-light btn-outline-success">Cadastrar</button>
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
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="card border-warning">
            <div class="card-header bg-warning row">
              <h4 class="mb-0 text-white">Adicionar Uma Conta</h4>
              <a href="javascript:void(0)" onclick="popup()"  class="btn btn-secondary col-md-2  ml-auto">Adicionar</a>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card text-white bg-primary">
            <div class="card-header text-white bg-primary row">
              <h4 class="mb-0 text-white">Gerar Relatório</h4>
              <a href="javascript:void(0)" onclick="geraRelat()"  class="btn btn-dark col-md-2 ml-auto">Gerar</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table id="tableDoc" class="table table-striped table-bordered no-wrap">
            <thead>
              <tr >
                <th>Tipo</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Situação</th>
              </tr>
              
            </thead>
            <tbody>
            <tr>
                <?php
                  require "../backend/list_contas_pag.php";
                ?>
              </tr>
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
