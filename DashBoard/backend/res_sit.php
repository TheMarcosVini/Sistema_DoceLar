<?php
$connect = new PDO("mysql:host=localhost;dbname=docelar", "root", "");

$data = [
	'valor' => $_POST["valor"],
	'orc' => $_POST["orc"],
];

$stmt = $connect->prepare('UPDATE orcamento_mestre SET situacao = :valor WHERE numero_orcamento = :orc');

try{
	$connect->beginTransaction();
	$stmt->execute($data);
	$connect->commit();
	echo 'Registro salvo com sucesso';
}catch (Exception $e) {
	$connect->rollback();
	throw $e;
}
?>
