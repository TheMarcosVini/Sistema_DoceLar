<?php
session_start();
include('../../login/backend/verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
  <title>Dashboard Doce Lar</title>
  <!-- Custom CSS -->
  <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
  <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"  crossorigin="anonymous">
  <!-- Custom CSS -->
  <link href="../dist/css/style.min.css" rel="stylesheet">
  <script src="../js/functions.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style media="screen">
  @keyframes moveIn {
    from{
      margin-top: 0px;
    }
    to{
      margin-top: -20px;
    }
  }
  @keyframes moveOut {
    from{
      margin-top: 0px;
    }
    to{
      margin-top: 20px;
    }
  }
  </style>
</head>
<style>
#wrapper { width: 620px; margin-left:30px;}
table {margin:25px 0 50px 0;float: left;}
td, th {padding: 5px 20px 5px 5px;}
canvas { margin:30px 50px; float:right;}
</style>
<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
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

    <div class="page-wrapper" >
      <div class="container-fluid">

        <div class="col-7 align-self-center">
          <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Olá, <?php echo $_SESSION['nome'] ?></h3>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <br><br>
        <div class="card-group">
          <?php
          require('../backend/conectbd.php');
          $sql =  "select count(*) as totalArray from clientes";
          $result = mysqli_query($link, $sql);
          $row = mysqli_fetch_assoc($result);
          $clientes = $row['totalArray'];
          $clientes = str_pad($clientes, 3, "0", STR_PAD_LEFT);
          ?>
          <button id="cliente" onmousemove="moveIn(id)" onmouseout="moveOut(id)" style="" onclick="window.location.href='list_cliente.php'" class="card border-right">
            <div class="card-body">
              <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                  <div class="d-inline-flex align-items-center">
                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo $clientes + 872; ?></h2>
                    <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">163</span>
                  </div>
                  <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Clientes Cadastrados</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                  <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></span>
                </div>
              </div>
            </div>
          </button>
          <?php
          require('../backend/conectbd.php');
          $sql2 =  "select count(*) as totalArray2 from orcamento_mestre";
          $result2 = mysqli_query($link, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $num_orc = $row2['totalArray2'];
          $num_orc = str_pad($num_orc, 3, "0", STR_PAD_LEFT);

          $sql3 =  "select count(*) as totalArray3 from orcamento_mestre WHERE situacao = 'fechada'";
          $result3 = mysqli_query($link, $sql3);
          $row3 = mysqli_fetch_assoc($result3);
          $num_orc2 = $row3['totalArray3'];
          $num_orc2 = str_pad($num_orc2, 3, "0", STR_PAD_LEFT);
          ?>
          <button id="ganhos" onmousemove="moveIn(id)" onmouseout="moveOut(id)" onclick="window.location.href='contas_receb.php'" class="card border-right">
            <div class="card-body">
              <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                  <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup class="set-doller">R$</sup>7.397,99</h2>
                  <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ganhos do mês
                  </h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                  <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></span>
                </div>
              </div>
            </div>
          </button>
          <button id="orcamento" onmousemove="moveIn(id)" onmouseout="moveOut(id)" onclick="window.location.href='exib_orcamento.php'" class="card border-right">
            <div class="card-body">
              <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                  <div class="d-inline-flex align-items-center">
                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo $num_orc + 98; ?></h2>
                    <span class="badge bg-success font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block"><?php echo $num_orc2 + 56 ; ?></span>
                  </div>
                  <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Orçamentos</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                  <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">g></span>
                  </div>
                </div>
              </div>
            </button>
            <button id="contas" onmousemove="moveIn(id)" onmouseout="moveOut(id)" onclick="window.location.href='contas_pag.php'"  class="card">
              <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                  <div>
                    <h2 class="text-dark mb-1 font-weight-medium"><sup class="set-doller">R$</sup>2,362.97</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Contas a pagar</h6>
                  </div>
                  <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></span>
                  </div>
                </div>
              </div>
            </button>
          </div>

          <!-- <div class="card-body" style="font-family: Arial; color:black; height: 350px;">
          <div id="wrapper">
          <canvas id="canvas" width="300" height="300"></canvas>
          <table id="mydata">
          <thead>
          <tr>
          <th>Tipo</th>
          <th>Valor</th>
        </tr>
      </thead>

      <tbody>
      <tr style="background-color:#99e599">
      <td>Ganhos R$:</td>
      <td>13.79</td>
    </tr>

    <tr style="background-color:#ff9e81">
    <td>Débito R$:</td>
    <td>413.88</td>
  </tr>
</tr>
</tbody>
</table>

</div>
</div> -->


<div class="">
  <div  style="width:70%; float:left;">
    <canvas id="canvas"></canvas>
  </div>
  <div class="wrapper" style="float: right; width: 30%; margin-top:10%;">
    <div class="title text-center " style="margin-right: 10%;">
      <h3>Mês atual:</h3>
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <div class="chart-wrapper">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<script>
var MONTHS = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezebro'];
var config = {
  type: 'line',
  data: {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
    datasets: [{
      label: 'Vendas',
      backgroundColor: window.chartColors.red,
      borderColor: window.chartColors.red,
      data: [
        10,
        30,
        40,
        40,
        50,
        45,
        60
      ],
      fill: false,
    }, {
      label: 'Lucros',
      fill: false,
      backgroundColor: window.chartColors.blue,
      borderColor: window.chartColors.blue,
      data: [
        20,
        25,
        20,
        10,
        30,
        40,
        70
      ],
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: '1°Semestre 2020'
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    hover: {
      mode: 'nearest',
      intersect: true
    },
    scales: {
      xAxes: [{
        display: true,
        scaleLabel: {
          display: false,
          labelString: 'Mês'
        }
      }],
      yAxes: [{
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Value'
        }
      }]
    }
  }
};

window.onload = function() {
  var ctx = document.getElementById('canvas').getContext('2d');
  window.myLine = new Chart(ctx, config);
};

</script>


















<style media="screen">
body {
  margin: 0;
}

.container {
}

.chart-wrapper {
  width: 500px;
  height: 500px;
  margin: 0 auto;
}
</style>



<script type="text/javascript">
let ctx = document.getElementById('myChart').getContext('2d');
let labels = ['A pagar', 'Ganhos', 'Renda'];
let colorHex = ['#FB3640', '#EFCA08', '#43AA8B'];

let myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [((30/160)*100).toFixed(2), ((50/160)*100).toFixed(2), ((80/160)*100).toFixed(2)],
      backgroundColor: colorHex
    }],
    labels: labels
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: -10,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
})
</script>

<div class="row" style="width:100%">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center mb-4">
          <h4 class="card-title">Administradores</h4>
          <div class="ml-auto">
            <div class="dropdown sub-dropdown">
              <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                <a class="dropdown-item" href="#">Insert</a>
                <a class="dropdown-item" href="#">Update</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table no-wrap v-middle mb-0">
            <thead>
              <tr class="border-0">
                <th class="border-0 font-14 font-weight-medium text-muted">Foto
                </th>
                <th class="border-0 font-14 font-weight-medium text-muted px-2">Nivel de acesso
                </th>
                <th class="border-0 font-14 font-weight-medium text-muted">Projetos</th>
                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                  Status
                </th>
                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                  Semanas de Trabalho
                </th>
                <th class="border-0 font-14 font-weight-medium text-muted">Salário</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border-top-0 px-2 py-4">
                  <div class="d-flex no-block align-items-center">
                    <div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45"></div>
                    <div class="">
                      <h5 class="text-dark mb-0 font-16 font-weight-medium">Hanna
                        Gover</h5>
                        <span class="text-muted font-14">hgover@gmail.com</span>
                      </div>
                    </div>
                  </td>
                  <td class="border-top-0 text-muted px-2 py-4 font-14">Elite Admin</td>
                  <td class="border-top-0 px-2 py-4">
                    <div class="popover-icon">
                      <a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)">DS</a>
                      <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item" href="javascript:void(0)">SS</a>
                      <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item" href="javascript:void(0)">RP</a>
                      <a class="btn btn-success text-white rounded-circle btn-circle font-20" href="javascript:void(0)">+</a>
                    </div>
                  </td>
                  <td class="border-top-0 text-center px-2 py-4"><i class="fa fa-circle text-primary font-12" data-toggle="tooltip" data-placement="top" title="" data-original-title="In Testing"></i></td>
                  <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                    35
                  </td>
                  <td class="font-weight-medium text-dark border-top-0 px-2 py-4">R$7.450,00
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-4">
                    <div class="d-flex no-block align-items-center">
                      <div class="mr-3"><img src="../assets/images/users/widget-table-pic2.jpg" alt="user" class="rounded-circle" width="45" height="45"></div>
                      <div class="">
                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Daniel
                          Kristeen
                        </h5>
                        <span class="text-muted font-14">Kristeen@gmail.com</span>
                      </div>
                    </div>
                  </td>
                  <td class="text-muted px-2 py-4 font-14">Real Homes WP Theme</td>
                  <td class="px-2 py-4">
                    <div class="popover-icon">
                      <a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)">DS</a>
                      <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item" href="javascript:void(0)">SS</a>
                      <a class="btn btn-success text-white rounded-circle btn-circle font-20" href="javascript:void(0)">+</a>
                    </div>
                  </td>
                  <td class="text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="" data-original-title="Done"></i>
                  </td>
                  <td class="text-center text-muted font-weight-medium px-2 py-4">32</td>
                  <td class="font-weight-medium text-dark px-2 py-4">R$7.450,00</td>
                </tr>
                <tr>
                  <td class="px-2 py-4">
                    <div class="d-flex no-block align-items-center">
                      <div class="mr-3"><img src="../assets/images/users/widget-table-pic3.jpg" alt="user" class="rounded-circle" width="45" height="45"></div>
                      <div class="">
                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Julian
                          Josephs
                        </h5>
                        <span class="text-muted font-14">Josephs@gmail.com</span>
                      </div>
                    </div>
                  </td>
                  <td class="text-muted px-2 py-4 font-14">MedicalPro WP Theme</td>
                  <td class="px-2 py-4">
                    <div class="popover-icon">
                      <a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)">DS</a>
                      <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item" href="javascript:void(0)">SS</a>
                      <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item" href="javascript:void(0)">RP</a>
                      <a class="btn btn-success text-white rounded-circle btn-circle font-20" href="javascript:void(0)">+</a>
                    </div>
                  </td>
                  <td class="text-center px-2 py-4"><i class="fa fa-circle text-primary font-12" data-toggle="tooltip" data-placement="top" title="" data-original-title="Done"></i>
                  </td>
                  <td class="text-center text-muted font-weight-medium px-2 py-4">29</td>
                  <td class="font-weight-medium text-dark px-2 py-4">R$7.450,00</td>
                </tr>
                <tr>
                  <td class="px-2 py-4">
                    <div class="d-flex no-block align-items-center">
                      <div class="mr-3"><img src="../assets/images/users/widget-table-pic4.jpg" alt="user" class="rounded-circle" width="45" height="45"></div>
                      <div class="">
                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Jan
                          Petrovic
                        </h5>
                        <span class="text-muted font-14">hgover@gmail.com</span>
                      </div>
                    </div>
                  </td>
                  <td class="text-muted px-2 py-4 font-14">Hosting Press HTML</td>
                  <td class="px-2 py-4">
                    <div class="popover-icon">
                      <a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)">DS</a>
                      <a class="btn btn-success text-white font-20 rounded-circle btn-circle" href="javascript:void(0)">+</a>
                    </div>
                  </td>
                  <td class="text-center px-2 py-4"><i class="fa fa-circle text-danger font-12" data-toggle="tooltip" data-placement="top" title="" data-original-title="In Progress"></i></td>
                  <td class="text-center text-muted font-weight-medium px-2 py-4">23</td>
                  <td class="font-weight-medium text-dark px-2 py-4">R$7.450,00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="" style="height:700px;">

</div> -->


</div>
</div>
<footer class="footer text-center text-muted">

</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
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
