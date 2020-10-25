<?php
    require('conectbd.php');

    $cnpj = $_GET['CNPJ'];

    $query = "DELETE FROM fornecedor WHERE CNPJ = $cnpj ";
    mysqli_query($link, $query);

    echo "<script> alert('Pessoa excluida com sucesso!!!') </script>
       <meta http-equiv='refresh' content=0.1;url='../html/list_fornecedor.php'>";

?>
