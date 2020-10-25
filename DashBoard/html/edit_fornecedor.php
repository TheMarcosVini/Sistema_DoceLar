<?php
session_start();
include('../../login/backend/verifica_login.php');
?>
<?php
$id_Fornecedor = $_GET['id_Fornecedor'];
require ('../backend/conectbd.php');
$query = "SELECT * FROM fornecedor WHERE id_Fornecedor = $id_Fornecedor";
$resultado = mysqli_query($link, $query);
$dados = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cadastro do Fornecedor</title>
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

                <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
                   <div class="page-wrapper" style="display: block;">
                       <div class="page-breadcrumb">
                           <div class="row">
                               <div class="col-7 align-self-center">
                                   <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cadastrar Fornecedor</h4>
                                   <div class="d-flex align-items-center">
                                       <nav aria-label="breadcrumb">
                                           <ol class="breadcrumb m-0 p-0">
                                               <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                                               <li class="breadcrumb-item text-muted active" aria-current="page">Cadastro Fornecedor</li>
                                           </ol>
                                       </nav>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="container-fluid">
                        <form action="../backend/res_edit_fornecedor.php" method="POST">
                        <input type="text" value="<?php echo $dados['id_Fornecedor'];?>" name="id_Fornecedor" style="visibility: hidden;">
                           <div class="row" style="justify-content: center;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="razao_social" placeholder="Razão Social" value="<?php echo $dados['Razao_Social'];?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Sobrenome">
                                    </div>
                                </div> -->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $dados['Email'];?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="justify-content: center;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cnpj" placeholder="CNPJ" value="<?php echo $dados['CNPJ'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" value="<?php echo $dados['Telefone'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="justify-content: center;">
                                <div class="col-md-4">


                                            <select name="estado" class="custom-select mr-sm-2" id="inlineFormCustomSelect" value="<?php echo $dados['Estado'];?>">
                                                <option selected>Estado</option>
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
                                        <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="<?php echo $dados['Cidade'];?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="justify-content: center;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="<?php echo $dados['Bairro'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="complemento" placeholder="Complemento" value="<?php echo $dados['Complemento'];?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="endereco" placeholder="Endereço" value="<?php echo $dados['Endereco'];?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cep" placeholder="CEP" value="<?php echo $dados['CEP'];?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="justify-content: center;">
                                <div class="col-md-8">
                                    <button style="float:right;" type="submit" class="btn waves-effect waves-light btn-outline-success">Atualizar Cadastro</button>
                                </div>
                            </div>
                       </div>
                   </div>
                   </form>
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
