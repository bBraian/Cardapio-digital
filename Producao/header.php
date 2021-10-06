<?php
include('./conecao.php');
$sql = $pdo->query("SELECT nome, whatsapp, link_instagram, link_facebook, link_logo, link_capa FROM bas_empresa");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Beto's Bar</title>
</head>
<?php
while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
?>

    <body>
        <header>
            <!-- EMPRESA -->
            <div class="empresa">

                <!-- CAPA -->
                <div class="capa" style="background-image: url('<?= $linha['link_capa'] ?>');"></div>
                <!-- /CAPA -->

                <div class="container_company">
                    <div class="logo-and-company">

                        <!-- LOGO -->
                        <div class="logo">
                            <div class="img_logo" style="background-image: url('<?= $linha['link_logo'] ?>');"></div></div>
                        </div>
                        <!-- /LOGO -->

                        <!-- NOME EMPRESA -->
                        <h1 class="company-name"><?= $linha['nome'] ?></h1>
                        <!-- /NOME EMPRESA -->

                        <!-- REDES SOCIAIS -->
                        <div class="redes-sociais">

                            <!-- FACEBOOK -->
                            <a href="<?= $linha['link_facebook'] ?>" target="_blank" class="social-link">
                                <div class="rds">
                                    <div class="instagram" style="background-image: url('https://app.olaclick.com/_nuxt/img/icon-facebook.325cf74.png');">
                                    </div>
                                </div>
                            </a>
                            <!-- /FACEBOOK -->

                            <!-- INSTAGRAM -->
                            <a href="<?= $linha['link_instagram'] ?>" target="_blank" class="social-link">
                                <div class="rds">
                                    <div class="instagram" style="background-image: url('https://app.olaclick.com/_nuxt/img/icon-instagram.0ab1702.png');">
                                    </div>
                                </div>
                            </a>
                            <!-- /INSTAGRAM -->

                        </div>
                        <!-- /REDES SOCIAIS-->
                    </div>
                </div>

                <!-- CATEGORIAS -->
                <div class="categorias">
                    <ul class="categoria-slider">
                        <li class="item-categoria">
                            <a href="index.php" style="text-decoration: none;"><div class="item">🍔Hamburgúeres</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="porcoes.php" style="text-decoration: none;"><div class="item">🍟Porções</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="tabuas.php" style="text-decoration: none;"><div class="item">🥗Porções na tábua</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="lanches.php" style="text-decoration: none;"><div class="item">🌭Lanches</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="pasteis.php" style="text-decoration: none;"><div class="item">🥟Pasteis</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="panquecas.php" style="text-decoration: none;"><div class="item">🥞Panquecas</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="pizzas.php" style="text-decoration: none;"><div class="item">🍕Pizzas</div></a>
                        </li>

                        <li class="item-categoria">
                            <a href="bebidas.php" style="text-decoration: none;"><div class="item">🍸Bebidas</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="acai.php" style="text-decoration: none;"><div class="item">🍨Açaí</div></a>
                        </li>
                    </ul>
                </div>
                <!-- /CATEGORIAS -->

            </div>
        </header> <!-- /EMPRESA -->
    <?php } ?>