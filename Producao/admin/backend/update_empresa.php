<?php

include('../../conecao.php');

$logo = $_POST['ne_logo'];
$capa = $_POST['ne_capa'];
$nome = $_POST['ne_nome'];
$insta = $_POST['ne_insta'];
$facebook = $_POST['ne_facebook'];
$whats = $_POST['ne_whats'];

$sql = $pdo->query("UPDATE bas_empresa 
SET nome = '".$nome."', whatsapp = '".$whats."', link_instagram = '".$insta."', link_facebook = '".$facebook."', link_logo = '".$logo."', link_capa = '".$capa."' ");
$sql->execute();

?>