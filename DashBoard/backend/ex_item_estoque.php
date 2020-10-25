<?php
require('conectbd.php');

$id_item = $_GET['id'];

$query = "DELETE FROM estoque WHERE id = $id_item ";
mysqli_query($link, $query);

echo "<script> alert('Material excluido do estoque com sucesso!!!') </script>
   <meta http-equiv='refresh' content=0.1;url='../html/list_estoque.php'>";

?>
