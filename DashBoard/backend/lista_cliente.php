<?php
require('conectbd.php');

$query = "SELECT * FROM clientes ORDER BY Nome ASC";
$busca = mysqli_query($link, $query);
while($dados = mysqli_fetch_array($busca)){
  $id_Cliente = $dados['id_Cliente'];
  $cpf= $dados['CPF'];
  echo "
  <tr>
  <td>".$dados['Nome']."&ensp;".$dados['Sobrenome']."</td>
  <td>".formata_cpf_cnpj($cpf)."</td>
  <td>".$dados['Email']."</td>
  <td>".$dados['Telefone']."</td>
  <td>
  <center>
  <a href='../backend/ex_cliente.php?id_Cliente=$id_Cliente' title='Excluir' class='feather-icon icon-trash'>

  </a>
  </center>
  </td>
  <td>
  <center>
  <a href='../html/edit_cliente.php?id_Cliente=$id_Cliente' title='Editar' class='feather-icon fas fa-edit'>

  </a>
  </center>
  </td>
  <td>
  <center>
  <a href='../html/orcamento.php?id_Cliente=$id_Cliente' title='Gerar Orçamento' class='feather-icon fas icon-notebook'>

  </a>
  </center>
  </td>
  </tr>
  ";
}
function formata_cpf_cnpj($cpf_cnpj){
    /*
        Pega qualquer CPF e CNPJ e formata

        CPF: 000.000.000-00
        CNPJ: 00.000.000/0000-00
    */
    ## Retirando tudo que não for número.
    $cpf_cnpj = preg_replace("/[^0-9]/", "", $cpf_cnpj);
    $tipo_dado = NULL;
    if(strlen($cpf_cnpj)==11){
        $tipo_dado = "cpf";
    }
    if(strlen($cpf_cnpj)==14){
        $tipo_dado = "cnpj";
    }
    switch($tipo_dado){
        default:
            $cpf_cnpj_formatado = "Não foi possível definir tipo de dado";
        break;

        case "cpf":
            $bloco_1 = substr($cpf_cnpj,0,3);
            $bloco_2 = substr($cpf_cnpj,3,3);
            $bloco_3 = substr($cpf_cnpj,6,3);
            $dig_verificador = substr($cpf_cnpj,-2);
            $cpf_cnpj_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."-".$dig_verificador;
        break;

        case "cnpj":
            $bloco_1 = substr($cpf_cnpj,0,2);
            $bloco_2 = substr($cpf_cnpj,2,3);
            $bloco_3 = substr($cpf_cnpj,5,3);
            $bloco_4 = substr($cpf_cnpj,8,4);
            $digito_verificador = substr($cpf_cnpj,-2);
            $cpf_cnpj_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."/".$bloco_4."-".$digito_verificador;
        break;
    }
    return $cpf_cnpj_formatado;
    echo $cpf_cnpj_formatado;
}
?>
