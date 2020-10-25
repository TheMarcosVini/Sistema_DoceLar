<?php
    require('conectbd.php');

    $id_Funcionario = $_GET['id_Funcionario'];

    $query = "DELETE FROM funcionarios WHERE id_Funcionario = $id_Funcionario ";
    mysqli_query($link, $query);

    echo "<script> alert('Pessoa excluida com sucesso!!!') </script>
       <meta http-equiv='refresh' content=0.1;url='../html/list_funcionario.php'>";

?>
