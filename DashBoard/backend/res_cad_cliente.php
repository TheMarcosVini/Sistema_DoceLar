<?php
    $Cpf = $_POST['cpf'];
    $Rg = $_POST['rg'];
    $Nome = $_POST['nome'];
    $Sobrenome = $_POST['sobrenome'];
    $Email = $_POST['email'];
    $Data_Nasc = $_POST['data'];
    $Telefone = $_POST['telefone'];
    $Cidade = $_POST['cidade'];
    $Estado = $_POST['estado'];
    $Bairro = $_POST['bairro'];
    $Complemento = $_POST['complemento'];
    $Endereco = $_POST['endereco'];
    $CEP = $_POST['cep'];

    require('conectbd.php');

    $sqlinsert = "INSERT INTO clientes(CPF, RG, Nome, Sobrenome, Data_Nascimento, Email, 
    Telefone, Cidade, Estado, Bairro, Complemento, Endereco, CEP) 
    VALUES ('$Cpf', '$Rg', '$Nome', '$Sobrenome', '$Data_Nasc', '$Email', '$Telefone',
    '$Cidade', '$Estado', '$Bairro', '$Complemento', '$Endereco', '$CEP')";

    mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados");

    echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
        <meta http-equiv='refresh' content=0.1;url='../html/cad_cliente.php'>";
?>