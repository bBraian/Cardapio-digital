<?php

include('../../conecao.php');

$fotoU = $_POST['fotoU'];
$nomeU = $_POST['nomeU'];
$descricaoU = $_POST['descricaoU'];
$precoU = $_POST['precoU'];
$categoriaU = $_POST['categoriaU'];
$idU = $_POST['idU'];

$sql = $pdo->query("UPDATE bas_itens SET link_foto = '".$fotoU."', nome_item = '".$nomeU."', descricao = '".$descricaoU."', preco = '".$precoU."', categoria = '".$categoriaU."' 
WHERE id = '".$idU."'");
$sql->execute();

?>