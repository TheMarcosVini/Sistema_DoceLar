<?php
require('conectbd.php');

$pesquisa = "SELECT * FROM estoque";
$query = mysqli_query($link, $pesquisa);

while ($dados = mysqli_fetch_array($query)) {
  $id =  $dados['id'];
  echo "
  <tr>
  <td>".str_replace("_"," ",$dados['material'])."</td>
  <td><center>".$dados['quantidade']."</center> </td>
  <td><center><a href='../backend/ex_item_estoque.php?id=$id' class='feather-icon icon-trash'></td>
  <td><center><a href='javascript:void(0)' onclick='popup($id)' class='feather-icon icon-drawar'></td>
  </tr>
  ";
}
?>
