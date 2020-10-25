<script src="../js/functions.js"> </script>
<?php
require('conectbd.php');

$query = "SELECT * FROM orcamento_mestre";
$busca = mysqli_query($link, $query);
while($dados = mysqli_fetch_array($busca) ){

  $id_Cliente = $dados['id_Cliente'];
  $numero_orcamento = $dados['numero_orcamento'];
  $valor = $dados['Valor_Descontado'];
  $cpf= $dados['CPF'];
  $situacao = $dados['situacao'];
  switch ($situacao) {
    case 'aberta':
    $sit = "<button type='button' id='btn1".$dados['numero_orcamento']."' name='btn1".$dados['numero_orcamento']."' value='aberta'  onclick='situation(id)' class='btn waves-effect waves-light btn-danger'>Aberto</button>";
    break;
    case 'fechada':
    $sit = "<button type='button' id='btn2".$dados['numero_orcamento']."' name='btn2".$dados['numero_orcamento']."' value='fechada'  onclick='situation(id)' class='btn waves-effect waves-light btn-success'>Fechado</button>";
    break;
  }
  echo "
  <tr>
  <td style='display:none;'><input id='sit".$dados['numero_orcamento']."' value='".$situacao."'></td>
  <td>".$dados['numero_orcamento']."</td>
  <td>".$dados['Nome_Cliente']."&ensp;".$dados['Sobrenome_Cliente']."</td>
  <td>".formata_cpf_cnpj($cpf)."</td>
  <td>".'R$'.$valor = number_format($valor,2,',',".")."</td>
  <td>
  <center>
  <a href='detalhes_orc.php?id_Cliente=$id_Cliente&&numero_orcamento=$numero_orcamento' title='Detalhes' class='feather-icon   icon-equalizer'>
  </a>
  </center>
  </td>
  <td><center>".$sit."
  <button type='button' id='btn1".$dados['numero_orcamento']."' name='btn1".$dados['numero_orcamento']."' value='aberta' style='display:none;'  onclick='situation(id)' class='btn waves-effect waves-light btn-danger'>Aberto</button>
  <button type='button' id='btn2".$dados['numero_orcamento']."' name='btn2".$dados['numero_orcamento']."' value='fechada' style='display:none;'  onclick='situation(id)' class='btn waves-effect waves-light btn-success'>Fechado</button>
  </center></td>
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
}

?>
