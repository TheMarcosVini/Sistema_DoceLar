<?php
    $id_Cliente = $_POST['id_Cliente'];
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

    $sqlinsert = "UPDATE clientes SET CPF = '$Cpf', RG = '$Rg', Nome = '$Nome', Sobrenome = '$Sobrenome',
    Data_Nascimento = '$Data_Nasc', Email = '$Email', Telefone = '$Telefone', Cidade = '$Cidade', Estado = '$Estado',
    Bairro = '$Bairro', Complemento = '$Complemento', Endereco = '$Endereco', CEP = '$CEP' WHERE id_Cliente = '$id_Cliente'";

    mysqli_query($link, $sqlinsert) or die("Não foi possivel inserir no banco de dados");

    echo "<script> alert('Dados cadastrados com sucesso!!!') </script>
        <meta http-equiv='refresh' content=0.1;url='../html/list_cliente.php'>";
?>
