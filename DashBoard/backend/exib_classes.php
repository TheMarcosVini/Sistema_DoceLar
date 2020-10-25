<?php
require('conectbd.php');

$query = "SELECT * FROM classe_materiais ORDER BY Nome_Classe ASC";

$busca = mysqli_query($link, $query);

while($dados = mysqli_fetch_array($busca)){
  $idClasse = $dados ['id_Classe'];
  echo"
  <option value=".$dados['id_Classe'].">".$dados['Nome_Classe']."</option>
  ";
}
?>
