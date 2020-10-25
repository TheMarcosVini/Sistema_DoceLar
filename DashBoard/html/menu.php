<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
session_start();
include('../../login/backend/verifica_login.php');

?>
<aside class="left-sidebar" data-sidebarbg="skin6">
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
          aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
          class="hide-menu">Inicio</span></a></li>
          <li class="list-divider"></li>

          <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
            aria-expanded="false"><i class="feather-icon icon-user-follow"></i><span
            class="hide-menu"> Cadastro </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
              <li class="sidebar-item"><a href="cad_cliente.php" class="sidebar-link"><span
                class="hide-menu"> Clientes
              </span></a>
            </li>
            <li class="sidebar-item"><a href="cad_funcionario.php" class="sidebar-link"><span
              class="hide-menu"> Funcionarios
            </span></a>
          </li>
          <li class="sidebar-item"><a href="cad_fornecedor.php" class="sidebar-link"><span
            class="hide-menu"> Fornecedores
          </span></a>
        </li>

        <li class="sidebar-item"><a href="cad_mat_tipo.php" class="sidebar-link"><span
          class="hide-menu"> Materiais
        </span></a>
      </li>

    </ul>
  </li>
  <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
    aria-expanded="false"><i class="feather-icon icon-notebook"></i><span
    class="hide-menu">Orçamento </span></a>
    <ul aria-expanded="false" class="collapse  first-level base-level-line">
      <li class="sidebar-item"><a href="orcamento.php" class="sidebar-link"><span
        class="hide-menu"> Gerar Orçamento
      </span></a>
    </li>
    <li class="sidebar-item"><a href="exib_orcamento.php" class="sidebar-link"><span
      class="hide-menu"> Ver Orçamentos
    </span></a>
  </li>
</ul>
</li>
<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
  aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
  class="hide-menu">Financeiro </span></a>
  <ul aria-expanded="false" class="collapse  first-level base-level-line">
    <li class="sidebar-item"><a href="contas_pag.php" class="sidebar-link"><span
      class="hide-menu"> Contas a Pagar
    </span></a>
  </li>
  <li class="sidebar-item"><a href="contas_receb.php" class="sidebar-link"><span
    class="hide-menu"> Contas a Receber
  </span></a>
</li>
</ul>
</li>
<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
  aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
  class="hide-menu">Relatórios </span></a>
  <ul aria-expanded="false" class="collapse  first-level base-level-line">
    <li class="sidebar-item"><a href="re_cliente.php" class="sidebar-link"><span
      class="hide-menu"> Clientes
    </span></a>
  </li>
  <li class="sidebar-item"><a href="contas_receb.php" class="sidebar-link"><span
    class="hide-menu"> Funcionarios
  </span></a>
</li>
</ul>
</li>
<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
  aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
  class="hide-menu">Estoque </span></a>
  <ul aria-expanded="false" class="collapse  first-level base-level-line">
    <li class="sidebar-item"><a href="list_estoque.php" class="sidebar-link"><span
      class="hide-menu"> Materiais
    </span></a>
  </li>
  <li class="sidebar-item"><a href="inser_materiais.php" class="sidebar-link"><span
    class="hide-menu"> Inserir Materias
  </span></a>
</li>
<!-- <li class="sidebar-item"><a href="retir_materiais.php" class="sidebar-link"><span
  class="hide-menu"> Retirar Materiais
</span></a>
</li> -->
</ul>
</li>

<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
  aria-expanded="false"><i class="feather-icon icon-list"></i><span
  class="hide-menu">Consulta </span></a>
  <ul aria-expanded="false" class="collapse  first-level base-level-line">
    <li class="sidebar-item"><a href="list_cliente.php" class="sidebar-link"><span
      class="hide-menu"> Ver Clientes
    </span></a>
  </li>
  <li class="sidebar-item"><a href="list_funcionario.php" class="sidebar-link"><span
    class="hide-menu"> Ver Funcionarios
  </span></a>
</li>
<li class="sidebar-item"><a href="list_fornecedor.php" class="sidebar-link"><span
  class="hide-menu"> Ver Fornecedores
</span></a>
</li>
<li class="sidebar-item"><a href="list_materiais.php" class="sidebar-link"><span
  class="hide-menu"> Ver Materiais
</span></a>
</li>
</ul>
<li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="sobre.php"
aria-expanded="false"><i  class="feather-icon icon-question"></i><span
class="hide-menu">Sobre</span></a></li>
<li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ajuda.php"
aria-expanded="false"><i  class="feather-icon icon-direction"></i><span
class="hide-menu">Ajuda</span></a></li>
</li>
<!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html"
aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
class="hide-menu">Cards
</span></a>
</li> -->

</ul>
</nav>
<!-- End Sidebar navigation -->
</div>
</aside>
