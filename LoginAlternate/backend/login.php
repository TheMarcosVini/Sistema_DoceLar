<?php
//iniciando o script a partir de uma sessão
session_start();
// conectando com o BD
include('conexao.php');
// escapando de caracteres especias ao fazer a verificação no banco
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
//verificando no BD
$query = "SELECT nome FROM usuario WHERE email = '{$email}' AND senha='{$senha}'";
//exibindo resultado
$result = mysqli_query($conexao, $query);
//exibindo o n umero de linhas afetadas no BD
$row = mysqli_num_rows($result);
//login de ADM
if ($email == "admin@com" || $senha == "admin") {
	$admin = "admin";
	$_SESSION['nome'] = $admin;
	header('Location: ../../DashBoard/html/index.php');
	exit();
}
//executando caso o usuario seja executaro (row == 1)
if ($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	//executando uma sessao com o nome do usuario
	$_SESSION['nome'] = $usuario_bd['nome'];
	//direcionando a pagina
	header('Location: ../../DashBoard/html/index.php');
	exit();
}else{
	//criando sessão prorpia
	$_SESSION['nao_autenticado'] = true;
	//redirecionando a pagina de login
	header('Location: ../../login/index.php');
	exit();
}


?>
