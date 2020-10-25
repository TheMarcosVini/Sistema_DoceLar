<?php
$connect = new PDO("mysql:host=localhost;dbname=docelar", "root", "");

$data = [
	'valor' => $_POST["valor"],
];

$stmt = $connect->prepare('INSERT INTO classe_materiais (Nome_Classe) values (:valor)');

try{
	$connect->beginTransaction();
	$stmt->execute($data);
	$connect->commit();
	echo 'Registro salvo com sucesso';
}catch (Exception $e) {
	$connect->rollback();
	throw $e;
}
