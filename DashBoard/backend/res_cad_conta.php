<?php

$connect = new PDO("mysql:host=localhost;dbname=docelar", "root", "");

$data = [
  'tipo' => $_POST["tipo"],
  'valor_conta' => $_POST["valor_conta"],
  'dataCompra' => $_POST["dataCompra"],
  'dataFinal' => $_POST["dataFinal"],
  'descri' => $_POST["descri"],
];

$stmt = $connect->prepare('INSERT INTO contas_pagar (valor_conta, tipo_conta, data_inicial, data_final, descricao, situacao)
  VALUES (:valor_conta, :tipo, :dataCompra, :dataFinal, :descri, "aberta" )');

  try{
    $connect->beginTransaction();
    $stmt->execute($data);
    $connect->commit();
  }catch (Exception $e) {
    $connect->rollback();
    throw $e;
  }
  ?>
