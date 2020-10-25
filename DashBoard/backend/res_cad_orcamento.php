<?php
session_start();
require('conectbd.php');
error_reporting(0);
ini_set(“display_errors”, 0 );
$Cpf = $_POST['cpf'];
$qttdRows2 = $_POST['qttdRows2'];

$dcliente = $_POST['dcliente']; // ID CLIENTE
$ocliente = $_POST['ocliente']; // NUMERO ORCAMENTO
$orc_id = $dcliente.$ocliente; //  Localizador secundário
function replacerChar($str) {
  return preg_replace("/[^0-9]/", "-", $str);
}
$parcelas = $_POST['parcelas'];
// Parcelas
for ($i=1; $i <= $parcelas ; $i++) {
  $name = "numeroPCL" .$i;
  $$name = $_POST[$name];
  $realName = $$name;

  $name2 = "dataPCL" .$i;
  $$name2 = $_POST[$name2];
  $realName2 = $$name2;
  $data = replacerChar($realName2);
  $dia= substr($data, 0, 2);
  $mes= substr($data, 3, 2);
  $ano= substr($data, 6,7);
  $chave= $ano.$mes;
  $name3 = "valorPCL" .$i;
  $$name3 = $_POST[$name3];
  $realName3 = $$name3;
  $realName3 = number_format($realName3, 2, '.', '');

  $sqlinsert = "INSERT INTO parcelas_info(numero_parcela, valor_parcela, data_parcela, localiza_orc, chave, id_Cliente)
  VALUES ('$realName', '$realName3','$realName2','$orc_id','$chave','$dcliente')";

  mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados //3");

}
$nome = $_POST['Nome'];
$sobrenome = $_POST['Sobrenome'];
$total = $_POST['total'];
$desconto = $_POST['desconto'];
if($desconto = ""){
  $desconto = number_format($desconto, 2, '.', '');
}
$total2 = $_POST['total2'];
$parcelas = $_POST['parcelas'];

$formaPag = $_POST['customRadio'];
if ($formaPag == "outro") {
  $formaPag = $_POST['formaPagOutro'];
}else {
  $formaPag = $_POST['customRadio'];
}
$dataParcela1 = $_POST['dataPCL1'];
$obs = $_POST['OBS'];

// Orçamento mestre
$sqlinsert2 = "INSERT INTO `orcamento_mestre` (`Nome_Cliente`, `Sobrenome_Cliente`, `CPF`, `Valor_Total`, `Desconto`, `Valor_Descontado`, `Numero_Parcelas`, `Forma_Pag`, `OBS`, `numero_orcamento`, `id_Cliente`)
VALUES ('$nome', '$sobrenome','$Cpf','$total','$desconto','$total2','$parcelas','$formaPag','$obs','$ocliente','$dcliente')";


mysqli_query($link, $sqlinsert2) or die("Não foi possivel inserir no banco de dados //2");

for ($i=1; $i <= $qttdRows2 ; $i++) {
  $name = "subT" .$i;
  $$name = $_POST[$name];
  $realPedido = $$name;

  $name2 = "pedidoQTD" .$i;
  $$name2 = $_POST[$name2];
  $realPedido2 = $$name2;
  $realPedido2 = floatval($realPedido2);
  $name3 = "pedidoAmb" .$i;
  $$name3 = $_POST[$name3];
  $realPedido3 = $$name3;

  $name4 = "pedidoAcab" .$i;
  $$name4 = $_POST[$name4];
  $realPedido4 = $$name4;

  $name5 = "pedidoValor" .$i;
  $$name5 = $_POST[$name5];
  $realPedido5 = $$name5;

  $sqlinsert = "INSERT INTO dados_pedido(quantidade, ambiente, acabmat, valor, cpf_comprador, localiza_orc, valorUnid)
  VALUES ('$realPedido2', '$realPedido3','$realPedido4','$realPedido','$Cpf','$orc_id', '$realPedido5')";

  mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados //1");
}


echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
<meta http-equiv='refresh' content=0.1;url='../html/orcamento.php'>";

?>
