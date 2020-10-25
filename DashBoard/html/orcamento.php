<?php
session_start();
include('../../login/backend/verifica_login.php');
require('../backend/conectbd.php');
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Gerar Orçamento</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>;
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script src="../js/functions.js"> </script>
  <script src="../js/pdf.js">

  </script>
</head>
<body style="margin-top:-25px">

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
    <?php
    if(isset($_GET['id_Cliente'])):
      ?>
      <form id="bodyContent" action="../backend/res_cad_orcamento.php" method="POST">

        <div class="page-wrapper" style="display: block;">

          <div class="page-breadcrumb">
            <div class="row">
              <div class="col-7 align-self-center">
                <?php
                if(isset($_GET['id_Cliente'])){
                  $id_Cliente = $_GET['id_Cliente'];
                  $query = "SELECT * FROM clientes WHERE id_Cliente = '$id_Cliente'";
                  $busca = mysqli_query($link, $query);
                  $dados = mysqli_fetch_array($busca);
                  $id_Cliente = $dados['id_Cliente'];
                }else {
                  $id_Cliente = "";
                  $dados= array(
                    "Nome" => "",
                    "CPF" => "",
                    "RG" => "",
                    "Sobrenome" => "",
                    "Data_Nascimento" => "",
                    "Email" => "",
                    "Telefone" => "",
                    "Cidade" => "",
                    "Estado" => "",
                    "Bairro" => "",
                    "Complemento" => "",
                    "Endereco" => "",
                    "CEP" => "",
                  );
                }

                $sql =  "select count(*) as totalArray from orcamento_mestre";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                $numero_orc = $row['totalArray'] + 1;
                ?>
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Dados Cliente N° <input name="dcliente" style="background:none; border:none;" readonly  value="<?php   echo "$id_Cliente"; ?>"> </input></h4>
                <div class="d-flex align-items-center">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                      <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                      <li class="breadcrumb-item text-muted active" aria-current="page">Gerar Orçamento N° <input id="orcId" name="ocliente" style="background:none; border:none;" readonly value="<?php   echo "$numero_orc"; ?>" ></input> </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div id="cliente">


              <div class="row" style="justify-content: center;">
                <div class="col-md-4">
                  <div class="form-group">
                    <input name="Nome" required  value="<?php echo $dados['Nome'] ?>" id="Nome" type="text" class="form-control" placeholder="Nome">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input name="Sobrenome" required   value="<?php echo $dados['Sobrenome'] ?>"  id="Sobrenome" type="text" class="form-control" placeholder="Sobrenome">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <input type="email" id="Email"   value="<?php echo $dados['Email'] ?>" class="form-control" placeholder="Email">
                  </div>
                </div>

              </div>
              <div class="row" style="justify-content: center;">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" required id="CPF"  value="<?php echo $dados['CPF'] ?>" name="cpf" class=" form-control" placeholder="CPF">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input id="RG"  value="<?php echo $dados['RG'] ?>" type="text" class="form-control" placeholder="RG">
                  </div>
                </div>
              </div>
              <div class="row" style="justify-content: center;">
                <div class="col-md-4">

                  <div class="form-group">
                    <input  style="color: #b8c3d8;" type="text" id="DataNasc" onfocus="(this.type='date')" placeholder="Data de Nascimento" class="form-control" value="<?php echo $dados['Data_Nascimento'] ?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input  value="<?php echo $dados['Telefone'] ?>" type="text" id="Telefone" class="form-control" placeholder="Telefone">
                  </div>
                </div>
              </div>
              <div class="row" style="justify-content: center;">
                <div class="col-md-4">

                  <select  value="<?php echo $dados['Estado'] ?>" id="Estado" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option>Estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
                  </select>

                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input  value="<?php echo $dados['Cidade'] ?>" id="Cidade" type="text" class="form-control" placeholder="Cidade">
                  </div>
                </div>

              </div>
              <div class="row" style="justify-content: center;">
                <div class="col-md-4">
                  <div class="form-group">
                    <input  type="text" value="<?php echo $dados['Bairro'] ?>" id="Bairro" class="form-control" placeholder="Bairro">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input  type="text" value="<?php echo $dados['Complemento'] ?>" id="Comple" class="form-control" placeholder="Complemento">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input  type="text" value="<?php echo $dados['Endereco'] ?>" id="Endereco" class="form-control" placeholder="Endereço">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <input  type="text" value="<?php echo $dados['CEP'] ?>" id="CEP" class="form-control" placeholder="CEP">
                  </div>
                </div>
              </div>
            </div>
            <div style="margin-top:60px;" class="row">
              <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Dados Pedido</h4>
                <div class="d-flex align-items-center">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                      <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                      <li class="breadcrumb-item text-muted active" aria-current="page">Gerar Orçamento</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            <div  class="page-breadcrumb">
              <div class="table-responsive-sm">
                <table id= "tabs"  class="table">
                  <thead>
                    <tr>
                      <th scope="col">Qtde</th>
                      <th scope="col" >Ambiente</th>
                      <th scope="col">Acabamento/Material</th>
                      <th scope="col">Valor</th>
                      <th scope="col">SubTotal</th>
                    </tr>
                  </thead>
                  <tbody id ="table">
                  </tbody>
                  <tfoot>
                    <th scope="col">Total(R$):</th>
                    <th scope="col"><input type="number" readonly  onchange="resetRows()" class="form-control" name="total" id="total" value="0" placeholder=""></th>
                    <th scope="col"><input type="number"  class="form-control" name="desconto" id="desconto"  placeholder="Desconto(%) "></th>
                  </tfoot>
                </table>
              </div>
            </div>
            <div style="margin-top: -30px;"  class="page-breadcrumb">
              <div class="col-md-8">
                <button style="float:left;" type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="addRow2(); document.getElementById('qttdRows2').value = itens2">Adicionar Linha</button><input style="display: none;" id="qttdRows2" name="qttdRows2"  type="text" name="qttdRows2" value="">
              </div>
            </div>
            <div style="margin-top:90px;" class="row">
              <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Forma de Pagamento</h4>
                <div class="d-flex align-items-center">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                      <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                      <li class="breadcrumb-item text-muted active" aria-current="page">Gerar Orçamento</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">

              <h4 class="card-title">Selecione uma forma de Pagamento:</h4>
              <div name= "radios" class="row">
                <div style="margin-right:20px; margin-left:20px;" value="cheque" class="custom-control custom-radio">
                  <input type="radio" value="cheque" id="customRadio1" name="customRadio"
                  class="custom-control-input" >
                  <label class="custom-control-label" for="customRadio1">Cheque</label>
                </div>
                <div style="margin-right:20px;" value="cartao" class="custom-control custom-radio">
                  <input value="cartao" type="radio" id="customRadio2" name="customRadio"
                  class="custom-control-input" >
                  <label class="custom-control-label" for="customRadio2">Cartão</label>
                </div>
                <div style="margin-right:20px;"  value="alt" class="custom-control custom-radio">
                  <input value="outro" type="radio" id="customRadio3" name="customRadio"
                  class="custom-control-input" >
                  <label class="custom-control-label" for="customRadio3">Outro:<input name="formaPagOutro" for="customRadio3" id="altVal" style="width: 200px;border: none; border-bottom:1px solid black; background-color: #f5f5f2;"></input></label>
                </div>
              </div><br>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Quantidade de Parcelas:</label>
                <div style="margin-left:-30px;" class="col-sm-3">
                  <select class="form-control" name="parcelas" id="parcelas" onchange=" resetRows()">
                    <option selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
                </div>
              </div>
              <div style="margin-top:60px;" class="row">
                <div class="col-7 align-self-center">
                  <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Parcelas</h4>
                  <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Gerar Orçamento</li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <div  class="page-breadcrumb">
              <div class="table-responsive-sm">
                <table id= "tabs"  class="table">
                  <thead>
                    <tr>
                      <th scope="col">Parcela</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Data</th>
                    </tr>
                  </thead>
                  <tbody id ="table2">
                  </tbody>
                  <tfoot>
                    <th scope="col">Total(R$):</th>
                    <th scope="col"><input type="text"  readonly class="form-control" name="total2" id="total2" value="0" placeholder=""></th>
                  </tfoot>
                </table>
              </div>
            </div>
            <div style="margin-top: -30px;"  class="page-breadcrumb">
              OBS: <textarea style="resize: none;" class="form-control" id="OBS" name="OBS" rows="4" cols="10"></textarea>
            </div>
            <div  class="page-breadcrumb" style="margin-right:-20%;">
              <div class="row" style="justify-content: center;">
                <div class="col-md-8">
                  <button style="float:right;" type="submit" class="btn waves-effect waves-light btn-outline-success">Cadastrar</button>
                  <input type="button" style="float:right; margin-right:10px; margin-bottom:100px;"  onclick="gerarPDF()"  class="btn waves-effect waves-light btn-outline-success" value="Gerar PDF"></input>
                </div>
              </div>
            </div>

          </div>
        </form>
      <?php endif;
      if(empty($_GET['id_Cliente'])):
        ?>

        <div class="page-wrapper" style="display: block;">
          <div class="col-md-6" style="top:50%; left: 50%; transform: translate(-50%, -0%);">
            <div class="card text-white bg-danger">
              <div class="card-header">
                <h4 class="mb-0 text-white">Cliente Inválido</h4>
              </div>
              <div class="card-body">
                <h3 class="card-title text-white">Selecione Um Cliente Cadastrado</h3>
                <p class="card-text">Para uma maior agilidade no processo, por favor selecione um cliente.
                </p>
                <a href="list_cliente.php" class="btn btn-dark">Clientes</a>
              </div>
            </div>
          </div>
          <div class="page-breadcrumb">
          </div>
        </div>


      <?php endif; ?>

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
