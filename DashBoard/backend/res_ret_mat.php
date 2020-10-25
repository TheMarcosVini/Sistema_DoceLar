<?php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=docelar", "root", "");

$data = [
    'valor' => $_POST["valor"],
  	'id' => $_POST["id"],
];
echo $data['valor'];
echo $data['id'];
$consulta = $connect->query("SELECT * FROM estoque WHERE id = $data[id]");
$a1 = $consulta->fetchColumn(2);
// $consulta->fetchColumn(0);
$a2 =  $data['valor'];

if ($a1 >= $a2) {
  $result = $a1 - $a2;
  $stmt = $connect->prepare("UPDATE estoque SET quantidade = $result WHERE id = $data[id]");

  try{
    $connect->beginTransaction();
    $stmt->execute($data);
    $connect->commit();
    echo 'Registro salvo com sucesso';
  }catch (Exception $e) {
    $connect->rollback();
    throw $e;
  }
}
 else {
    $_SESSION['Erro'] = true;
    header("location: ../html/list_estoque.php");
  }

?>
