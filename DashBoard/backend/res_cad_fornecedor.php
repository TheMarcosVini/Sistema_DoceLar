<?php
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

    $sqlinsert = "INSERT INTO fornecedor(CNPJ, Razao_Social, Email, 
    Telefone, Cidade, Estado, Bairro, Complemento, Endereco, CEP) 
    VALUES ('$Cnpj', '$Razao_Social', '$Email', '$Telefone',
     '$Cidade', '$Estado', '$Bairro', '$Complemento', '$Endereco', '$CEP')";

    mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados");

    echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
        <meta http-equiv='refresh' content=0.1;url='../html/cad_fornecedor.php'>";
?>