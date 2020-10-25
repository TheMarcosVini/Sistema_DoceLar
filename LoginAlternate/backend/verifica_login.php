<?php
	// esse arquivo ira impossibilitar de que o usuario acesse a pagina de painel.php a partir da URL sem ter logado.
//caso o usuario nao tenha iniciado uma sessão, ele não podera exercutar o painel.php
if (!$_SESSION['nome']) {
	header('Location: ../../login/index.php ');
	exit();
}

?>
