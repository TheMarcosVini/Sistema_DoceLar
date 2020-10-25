<?php
require('conectbd.php');
function replacerChar($str) {
  return preg_replace("/[^0-9]/", "-", $str);
}
$mes_extenso = array(
  '01' => 'Janeiro',
  '02' => 'Fevereiro',
  '03' => 'Março',
  '04' => 'Abril',
  '05' => 'Maio',
  '06' => 'Junho',
  '07' => 'Julho',
  '08' => 'Agosto',
  '09' => 'Novembro',
  '10' => 'Setembro',
  '11' => 'Outubro',
  '12' => 'Dezembro'
);

for ($i=1; $i < 13 ; $i++) {
  $chave = date('Ym', strtotime($i.' month'));
  $query = "SELECT * FROM parcelas_info where chave = '$chave'";
  $busca = mysqli_query($link, $query);
  echo "<table id='tableDoc".$i."' class='table table-striped table-bordered'>";
  echo "<p><b>Referente a ".$mes_extenso[substr($chave, 4,5)]."/".substr($chave, 0,4)." :<b></P>";
  echo "<tr><th class='col-md'>Cliente</th><th class=''>Valor Da Parcela</th><th class=''>Numero da Parcela</th><th class=''>Data</th>";
  while($dados = mysqli_fetch_array($busca)) {
    $query2 = "SELECT Nome,Sobrenome,CPF FROM clientes where id_Cliente = '$dados[id_Cliente]' ";
    $busca2 = mysqli_query($link, $query2);
    $dados2 = mysqli_fetch_array($busca2);
    if ($dados2['Nome'] != "") {
      
      echo "<tr style='background-color:;color:black;'>
      <td>".$dados2['Nome']." ".$dados2['Sobrenome']." - ".$dados2['CPF']. "</td>
      <td>".'R$'.number_format($dados['valor_parcela'],2,',',".")."</td>
      <td><center>".$dados['numero_parcela']."</center></td>
      <td>".$dados['data_parcela']."</td></tr>";
      
    }

  }
  echo"</table>";
}


?>
