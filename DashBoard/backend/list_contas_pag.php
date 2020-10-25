<?php
require('conectbd.php');

$query = "SELECT * FROM contas_pagar ";
$busca = mysqli_query($link, $query);
while($dados = mysqli_fetch_array($busca)){
echo "
<tr>
<td>".$dados['tipo_conta']."</td>
<td>".$dados['data_final']."</td>
<td>".$dados['valor_conta']."</td>
<td>".$dados['situacao']."</td>
</tr>
";
}
?>