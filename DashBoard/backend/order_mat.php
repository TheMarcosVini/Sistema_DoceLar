<?php
require('conectbd.php');
$sql =  "SELECT * from Classe_Materiais";
$result = mysqli_query($link, $sql);

$options = "";
$options .= "<option disabled selected>Materiais</option>";
while ($dados = mysqli_fetch_array($result)) {
  $options.= "<optgroup label='".$dados['Nome_Classe']."'>".$dados['Nome_Classe'];
  $sql2 =  "SELECT Nome_Material, id_Material from materiais where fk_Classe = '$dados[id_Classe]'";
  var_dump($sql2);
  $result2 = mysqli_query($link, $sql2);

  while ($dados2 = mysqli_fetch_array($result2)) {
      $options .= "<option id=".$dados2['id_Material']." value=".$dados['Nome_Classe']."_".$dados2['Nome_Material'].">".$dados['Nome_Classe']." ".$dados2['Nome_Material']."</option>";
  }
  $options.= "</optgroup>";

}
echo $options;
?>
