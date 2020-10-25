<?php
session_start();
require('conectbd.php');
  $cont = $_POST['cont'];
  echo $cont;

  for ($i=1; $i <= $cont ; $i++) {
    $mat = "mat" .$i;
    $qtd = "qtd" .$i;

    $$mat = $_POST[$mat];
    $mat = $$mat;

    $$qtd = $_POST[$qtd];
    $qtd = $$qtd;

    if ($mat != "") {
      $sqlinsert = "UPDATE estoque SET quantidade = quantidade + $qtd WHERE material = '$mat' ";
      mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados");
    }
  }
  echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
  <meta http-equiv='refresh' content=0.1;url='../html/inser_materiais.php'>";
?>
