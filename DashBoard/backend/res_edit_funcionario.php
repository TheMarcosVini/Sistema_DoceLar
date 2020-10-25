<?php
   $id_Funcionario = $_POST['id_Funcionario'];
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

    $sqlinsert = "UPDATE funcionarios SET CPF = '$Cpf', Nome = '$Nome', Sobrenome = '$Sobrenome', 
    Data_Admissao = '$Data_Admissao', Email = '$Email', Telefone = '$Telefone', Cidade = '$Cidade',
    Estado = '$Estado', Bairro = '$Bairro', Complemento = '$Complemento', Endereco = '$Endereco', 
    CEP = '$CEP', Cargo = '$Cargo', Salario = '$Salario' WHERE id_Funcionario = $id_Funcionario";

    mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados");

    echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
        <meta http-equiv='refresh' content=0.1;url='../html/list_funcionario.php'>";
?>