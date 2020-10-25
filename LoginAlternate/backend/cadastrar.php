<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$sexo = $_POST['sexo'];

$sql = "select count(*) as total from usuario where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if($row['total'] == 1) {
	$_SESSION['email_existe'] = true;
	header('Location: ../singup.php');
	exit;
}

if (strtolower($nome) == "admin") {
	$_SESSION['nome_invalido'] = true;
	header('Location: cadastro.php');
	exit;
}else{
	$sql = "INSERT INTO usuario (nome, senha, data_cadastro, email, sexo) VALUES ('$nome', '$senha', NOW(), '$email', '$sexo')";

	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}

	$conexao->close();


	header('Location: ../singup.php');
	exit;
}
?>
