<?php  
	// exluindo as sessões e redirecionando ao index.php
	session_start();
	// para finalizar apenas uma sessão = "UNSET($_SESSION['nomedasessão']);"
	session_destroy();
	header('Location: ../index.php');
	exit();
?>