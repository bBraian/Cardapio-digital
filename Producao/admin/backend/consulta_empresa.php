<?php

include('../../conecao.php');

$empresa = $_POST['empresa'];

$sql = $pdo->query("SELECT nome, whatsapp, link_instagram, link_facebook, link_logo, link_capa FROM bas_empresa WHERE id = $empresa;");
$return = ['erro' => 'S', 'mensagem' => 'registro não encontrado'];
while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $return = [
        'nome' => $linha['nome'],
        'whatsapp' => $linha['whatsapp'],
        'instagram' => $linha['link_instagram'],
        'facebook' => $linha['link_facebook'],
        'logo' => $linha['link_logo'],
        'capa' => $linha['link_capa'],
        'erro' => 'N',
        'mensagem' => ''
    ];
}

$json = json_encode($return);
echo $json;

?>

