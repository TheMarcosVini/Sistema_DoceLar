<?php
    require('conectbd.php');

    $query = "SELECT * FROM fornecedor";
    $busca = mysqli_query($link, $query);

    while($dados = mysqli_fetch_array($busca)){
        $id_Fornecedor = $dados['id_Fornecedor'];
		echo "
            <tr>
                <td>".$dados['Razao_Social']."</td>
                <td>".$dados['Email']."</td>
				<td>".$dados['Telefone']."</td>
                <td>".$dados['Endereco']."</td>
                <td>
				  <center>
				     <a href='../backend/ex_fornecedor.php?id_Fornecedor=$id_Fornecedor'  title='Excluir' class='feather-icon icon-trash'>

				     </a>
				  </center>
                </td>
                <td>
				    <center>
				       <a href='../html/edit_fornecedor.php?id_Fornecedor=$id_Fornecedor' title='Editar' class='feather-icon fas fa-edit'>

				       </a>
				    </center>
				</td>
		</tr>
		";
	}
?>
