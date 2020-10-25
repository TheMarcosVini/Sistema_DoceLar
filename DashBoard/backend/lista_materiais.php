<?php
    require('conectbd.php');

    $query = "SELECT * FROM materiais ORDER BY Nome_Material ASC";
    $busca = mysqli_query($link, $query);

    while($dados = mysqli_fetch_array($busca)){
        $id_Material = $dados['id_Material'];
        $id_Material_Classe = $dados['fk_classe'];
        $query2 = "SELECT * FROM classe_materiais WHERE id_Classe = $id_Material_Classe";
        $busca2 = mysqli_query($link, $query2);
        $dados2 = mysqli_fetch_array($busca2);
		echo "
            <tr>
                <td>".$dados['id_Material']."</td>
                <td>".$dados['Nome_Material']."</td>
                <td>".$dados2['Nome_Classe']."</td>
                <td>
                <center>
                   <a href='../backend/ex_materiais.php?id_Material=$id_Material' title='Excluir' class='feather-icon icon-trash'>

                   </a>
                </center>
              </td>
		</tr>
		";
	}
?>
