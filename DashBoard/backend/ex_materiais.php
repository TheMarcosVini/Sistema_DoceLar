<?php
    require('conectbd.php');

    $id_Material = $_GET['id_Material'];

    $query = "DELETE FROM materiais WHERE id_Material = $id_Material ";
    mysqli_query($link, $query);

    echo "<script> alert('Material excluido com sucesso!!!') </script>
       <meta http-equiv='refresh' content=0.1;url='../html/list_materiais.php'>";

?>
