<?php

include('./../../conecao.php');

$logo = $_POST['logo'];
$capa = $_POST['capa'];
$nome = $_POST['nome'];
$instagram = $_POST['instagram'];
$facebook = $_POST['facebook'];
$whatsapp = $_POST['whatsapp'];

$sql = "INSERT INTO bas_empresa (nome, whatsapp, link_instagram, link_facebook, link_logo, link_capa) VALUES (?,?,?,?,?,?)";
$query = $pdo->prepare($sql);
$query->execute([$nome, $whatsapp, $instagram, $facebook, $logo, $capa]);

?>

<script>
    alert('Inserido com sucesso!');
    document.querySelector('.modal').style.display = 'none';
</script>