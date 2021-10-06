<?php
include('../../conecao.php');
$id = $_POST['id'];
$sql = $pdo->query("DELETE FROM bas_itens WHERE id = $id;");
$sql->execute();
?>