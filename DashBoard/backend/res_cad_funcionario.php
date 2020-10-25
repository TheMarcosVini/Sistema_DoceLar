<?php
    $Cpf = $_POST['cpf']; 
    $Nome = $_POST['nome'];
    $Sobrenome = $_POST['sobrenome'];
    $Email = $_POST['email'];
    $Data_Admissao = $_POST['data'];
    $Telefone = $_POST['telefone'];
    $Cidade = $_POST['cidade'];
    $Estado = $_POST['estado'];
    $Bairro = $_POST['bairro'];
    $Complemento = $_POST['complemento'];
    $Endereco = $_POST['endereco'];
    $CEP = $_POST['cep'];
    $Cargo = $_POST['cargo'];
    $Salario = $_POST['salario'];

    require('conectbd.php');

    $sqlinsert = "INSERT INTO funcionarios(CPF, Nome, Sobrenome, Email,
    Telefone, Cidade, Estado, Bairro, Complemento, Endereco, CEP, Data_Admissao, Cargo, Salario)
    VALUES ('$Cpf', '$Nome', '$Sobrenome', '$Email', '$Telefone',
     '$Cidade', '$Estado', '$Bairro', '$Complemento', '$Endereco', '$CEP', '$Data_Admissao',
     '$Cargo', '$Salario')";

    mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados");

    echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
        <meta http-equiv='refresh' content=0.1;url='../html/cad_funcionario.php'>";
?>
