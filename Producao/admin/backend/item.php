<?php

include('./../../conecao.php');

$imagem = $_POST['imagem'];
$nome_item = $_POST['nome-item'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];

$sql = "INSERT INTO bas_itens (link_foto, nome_item, descricao, preco, categoria) VALUES (?,?,?,?,?)";
$query = $pdo->prepare($sql);
$query->execute([$imagem, $nome_item, $descricao, $preco, $categoria]);

if($query) {
header('Location:hamburgueres.php');
}

?>