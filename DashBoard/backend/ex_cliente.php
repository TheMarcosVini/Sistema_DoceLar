<?php
    require('conectbd.php');

    $id_Cliente = $_GET['id_Cliente'];

    $query = "DELETE FROM clientes WHERE id_Cliente = $id_Cliente ";
    mysqli_query($link, $query);

    echo "<script> alert('Pessoa excluida com sucesso!!!') </script>
       <meta http-equiv='refresh' content=0.1;url='../html/list_cliente.php'>";

?>
