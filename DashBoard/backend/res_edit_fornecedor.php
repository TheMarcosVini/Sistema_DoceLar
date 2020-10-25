<?php
        $id_Fornecedor = $_POST['id_Fornecedor'];
        $Cnpj = $_POST['cnpj'];
        $Razao_Social = $_POST['razao_social'];
        $Email = $_POST['email'];
        $Telefone = $_POST['telefone'];
        $Cidade = $_POST['cidade'];
        $Estado = $_POST['estado'];
        $Bairro = $_POST['bairro'];
        $Complemento = $_POST['complemento'];
        $Endereco = $_POST['endereco'];
        $CEP = $_POST['cep'];

    require('conectbd.php');

    $sqlinsert = "UPDATE fornecedor SET CNPJ = '$Cnpj', Razao_Social = '$Razao_Social', Email = '$Email', Telefone = '$Telefone', 
    Cidade = '$Cidade', Estado = '$Estado', Bairro = '$Bairro', Complemento = '$Complemento', Endereco = '$Endereco', 
    CEP = '$CEP' WHERE id_Fornecedor = $id_Fornecedor";

    mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados");

    echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
        <meta http-equiv='refresh' content=0.1;url='../html/list_fornecedor.php'>";
?>