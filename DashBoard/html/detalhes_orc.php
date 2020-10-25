<?php
session_start();
include('../../login/backend/verifica_login.php');
require('../backend/conectbd.php');
$id_Cliente = $_GET['id_Cliente'];
$numeroOrc = $_GET['numero_orcamento'];

$query = "SELECT * FROM clientes WHERE id_Cliente = '$id_Cliente'";
$busca = mysqli_query($link, $query);
$dados = mysqli_fetch_array($busca);
$id_Cliente = $dados['id_Cliente'];
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Detalhes do Orçamento n°<?php echo  $numeroOrc ?></title>
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
  <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
  <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>;
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script src="../js/functions.js"> </script>
  <script src="../js/pdf.js">

  </script>

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

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
      <div class="page-wrapper" style="display: block;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-7 align-self-center">
              <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Detalhes Orçamento</h4>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Cliente</li>
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
                  <input name="Nome"  readonly id="Nome"  value="<?php echo $dados['Nome'] ?>" id="Nome" type="text" class="form-control" placeholder="Nome">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input name="Sobrenome" id="Sobrenome"  readonly  value="<?php echo $dados['Sobrenome'] ?>"  id="Sobrenome" type="text" class="form-control" placeholder="Sobrenome">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <input type="email"readonly id="Email"  value="<?php echo $dados['Email'] ?>" class="form-control" placeholder="Email">
                </div>
              </div>

            </div>
            <div class="row" style="justify-content: center;">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" id="CPF"  readonly  value="<?php echo $dados['CPF'] ?>" name="cpf" class=" form-control" placeholder="CPF">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input readonly id="RG" value="<?php echo $dados['RG'] ?>" type="text" class="form-control" placeholder="RG">
                </div>
              </div>
            </div>
            <div class="row" style="justify-content: center;">
              <div class="col-md-4">

                <div class="form-group">
                  <input readonly id="DataNasc" style="color: #b8c3d8;" type="text" onfocus="(this.type='date')" placeholder="Data de Nascimento" class="form-control" value="<?php echo $dados['Data_Nascimento'] ?>" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input id="Telefone"  readonly value="<?php echo $dados['Telefone'] ?>" type="text" class="form-control" placeholder="Telefone">
                </div>
              </div>
            </div>
            <div class="row" style="justify-content: center;">
              <div class="col-md-4">
                <input style="display:none;" type="text" name="orcId" id="orcId" value="<?php echo $numeroOrc  ?>">
                <select   readonly id="Estado"  value="<?php echo $dados['Estado'] ?>" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option value="<?php echo $dados['Estado'] ?>"><?php echo $dados['Estado'] ?> </option>
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
                  <input id="Cidade" readonly value="<?php echo $dados['Cidade'] ?>" type="text" class="form-control" placeholder="Cidade">
                </div>
              </div>

            </div>
            <div class="row" style="justify-content: center;">
              <div class="col-md-4">
                <div class="form-group">
                  <input readonly  id="Bairro" type="text" value="<?php echo $dados['Bairro'] ?>" class="form-control" placeholder="Bairro">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input readonly id="Comple" type="text" value="<?php echo $dados['Complemento'] ?>" class="form-control" placeholder="Complemento">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input readonly id="Endereco" type="text" value="<?php echo $dados['Endereco'] ?>" class="form-control" placeholder="Endereço">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input readonly id="CEP" type="text" value="<?php echo $dados['CEP'] ?>"s class="form-control" placeholder="CEP">
                </div>
              </div>
            </div>
          </div>
          <br><br><br>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
              <li class="breadcrumb-item text-muted active" aria-current="page">Dados sobre o pedido</li>
            </ol>
          </nav>
          <div  class="page-breadcrumb">
            <div class="table-responsive-sm">
              <table id= "tabs"  class="table">
                <thead>
                  <tr>
                    <th scope="col">Qtde</th>
                    <th scope="col" >Ambiente</th>
                    <th scope="col">Acabamento/Material</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Valor Total</th>
                  </tr>
                </thead>
                <tbody id ="table">
                  <?php
                  $localiza_orc = $id_Cliente.$numeroOrc;
                  $query2 = "SELECT * FROM dados_pedido WHERE localiza_orc = $localiza_orc";
                  $busca2 = mysqli_query($link, $query2);
                  $a = 1;
                  while($dados2 = mysqli_fetch_array($busca2)){
                    echo "
                    <tr>
                    <td><input readonly style='border:none;background:none;' id='pedidoQTD".$a."' value='".number_format($dados2['quantidade'],2,',',".")."'></input></td>
                    <td><input readonly style='border:none;background:none;' id='pedidoAmb".$a."' value='".$dados2['ambiente']."'></input></td>
                    <td><input readonly style='border:none;background:none;' id='pedidoAcab".$a."' value='".$dados2['acabmat']."'></input></td>
                    <td><input readonly style='border:none;background:none;' id='a".$a."' value='".'R$'.number_format($dados2['valorUnid'],2,',',".")."'></input></td>
                    <td><input readonly style='border:none;background:none;' id='subT".$a."' value='".'R$'. number_format($dados2['valor'],2,',',".")."'></input></td>
                    </tr>
                    ";
                    $a++;
                  }
                  $a = $a -1;
                  echo "
                    <input style='display:none;' id='qttdRows2' value ='".$a."'></input>
                  ";
                  ?>
                  <?php
                  $query3 = "SELECT * FROM orcamento_mestre WHERE numero_orcamento = $numeroOrc ";
                  $busca3 = mysqli_query($link, $query3);
                  $resposta = mysqli_fetch_array($busca3);
                  ?>
                </tbody>
                <tfoot>

                  <th scope="col">Total:</th>
                  <th scope="col"><input readonly style='border:none;background:none;' id="total" value="<?php $valor = $resposta['Valor_Total']; echo 'R$'.$valor = number_format($valor,2,',','.') ?>"></input></th>
                  <th  scope="col"><input readonly style='border:none;background:none;' value="<?php echo $resposta['Desconto'].'%' ; ?>" id="desconto"></input></th>
                  <th  scope="col"><input  readonly style='border:none;background:none;' id="total2" value="<?php echo 'R$'. number_format($resposta['Valor_Descontado'],2,',','.') ?>"></input></th>
                </tfoot>
              </table>

            </div>
          </div>
          <br><br><br>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
              <li class="breadcrumb-item text-muted active" aria-current="page">Informaçoes de Pagamento</li>
            </ol>
          </nav>
          <div class="table-responsive-sm">
            <table id= "tabs"  class="table">
              <thead>
                <tr>
                  <th scope="col">Forma de Pagamento</th>
                  <th scope="col" >Quantidade de Parcelas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query3 = "SELECT * FROM orcamento_mestre WHERE numero_orcamento = $numeroOrc ";
                $busca3 = mysqli_query($link, $query3);
                while($dados3 = mysqli_fetch_array($busca3)){
                  echo "
                  <tr>
                  <td id='customRadio1'>".$dados3['Forma_Pag']."</td>
                  <td><input readonly class='form-control' id='parcelas' value='".$dados3['Numero_Parcelas']."'></input></td>
                  </tr>
                  ";
                }

                ?>

              </tbody>

              <tfoot>

              </tfoot>
            </table>
            <br><br><br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Parcela</th>
                  <th scope="col" >Valor</th>
                  <th scope="col" >Data</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query3 = "SELECT * FROM parcelas_info WHERE localiza_orc = $localiza_orc ORDER BY numero_parcela ASC";
                $busca3 = mysqli_query($link, $query3);
                $i = 1;
                while($dados3 = mysqli_fetch_array($busca3)){

                  echo "
                  <tr>
                  <td><input style='border:none; background:none;' id='qtd".$i."' value='".$dados3['numero_parcela']."'></input></td>
                  <td><input style='border:none; background:none;' id='valor".$i."' value='".'R$'. number_format($dados3['valor_parcela'],2,',',".")."'></input></td>
                  <td><input readonly style='border:none; background:none;' id='data".$i."' value='".$dados3['data_parcela']."'></input></td>
                  </tr>
                  ";
                  $i++;
                }
                ?>
              </tbody>
            </table>
            <div>
              <?php
              $query4 = "SELECT OBS FROM orcamento_mestre WHERE numero_orcamento = $numeroOrc ";
              $busca4 = mysqli_query($link, $query4);
              $OBS = mysqli_fetch_array($busca4);
              ?>
              OBS: <textarea id="OBS"  readonly style="resize: none;" class="form-control" name="OBS" rows="4" cols="10"><?php echo $OBS['OBS'] ; ?></textarea>
            </div>
          </div>
        </div>
        <br><br>
        <input type="button" style="float:right; margin-right:10px; margin-bottom:100px;"  onclick="gerarPDF()"  class="btn waves-effect waves-light btn-outline-success" value="Gerar PDF"></input>

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
