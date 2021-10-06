<?php

include('../../conecao.php');
$id = $_POST['id'];

$sql = $pdo->query("SELECT link_foto, nome_item, descricao, preco, id, categoria FROM bas_itens WHERE id = $id;");
$return = ['erro' => 'S', 'mensagem' => 'registro não encontrado'];
while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $return = [
        'foto' => $linha['link_foto'],
        'nome' => $linha['nome_item'],
        'descricao' => $linha['descricao'],
        'preco' => $linha['preco'],
        'categoria' => $linha['categoria'],
        'id' => $linha['id'],
        'erro' => 'N',
        'mensagem' => ''
    ];
} 

$json = json_encode($return);
echo $json;

?>