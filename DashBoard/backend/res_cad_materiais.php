<?php
$ClasseMaterial = $_POST['classe'];
$NomeMaterial = $_POST['nome_material'];

require('conectbd.php');

$sqlinsert = "INSERT INTO materiais(Nome_Material, fk_classe) VALUES ('$NomeMaterial', '$ClasseMaterial')";
mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados 1");

$query = "SELECT Nome_Classe FROM Classe_Materiais where id_Classe = '$ClasseMaterial'";
$classe = mysqli_query($link, $query);
$classe = mysqli_fetch_array($classe);
$name = $classe['Nome_Classe']."_".$NomeMaterial;
$sqlinsert2 = "INSERT INTO estoque(classe, material, quantidade) VALUES ('$classe[Nome_Classe]','$name',0)";
mysqli_query($link, $sqlinsert2) or die("Não foi possivel inserir no banco de dados 2");
echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
<meta http-equiv='refresh' content=0.1;url='../html/cad_mat_tipo.php'>";
?>
