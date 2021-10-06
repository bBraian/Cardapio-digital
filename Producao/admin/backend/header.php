<?php
include('./../../conecao.php');
if ($_SESSION['login'] != true) {
    header('Location: ./../');
}

$sql = $pdo->query("SELECT nome, whatsapp, link_instagram, link_facebook, link_logo, link_capa FROM bas_empresa");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
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
                <div class="capa" style="background-image: url('<?= $linha['link_capa'] ?>');">
                    <!-- CONFIGS -->
                    <a href="javascript:void(0);" onclick="consulta_empresa(1)" class="btn btn-light" id="settings"><i class="fas fa-bars fa-2x"></i></a>
                    <!-- /CONFIGS -->
                </div>
                <!-- /CAPA -->



                <div class="container_company">
                    <div class="logo-and-company">

                        <!-- LOGO -->
                        <div class="logo">
                            <div class="img_logo" style="background-image: url('<?= $linha['link_logo'] ?>');"></div>
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
                                    <div class="instagram" style="background-image: url('https://app.olaclick.com/_nuxt/img/icon-facebook.325cf74.png');"></div>
                                </div>
                            </a>
                            <!-- /FACEBOOK -->

                            <!-- INSTAGRAM -->
                            <a href="<?= $linha['link_instagram'] ?>" target="_blank" class="social-link">
                                <div class="rds">
                                    <div class="instagram" style="background-image: url('https://app.olaclick.com/_nuxt/img/icon-instagram.0ab1702.png');"></div>
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
                            <a href="hamburgueres.php" style="text-decoration: none;"><div class="item">🍔Hamburgúeres</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="porcoes.php" style="text-decoration: none;"><div class="item">🍟Porções</div></a>
                        </li>
                        <li class="item-categoria">
                            <a href="tabuas.php" style="text-decoration: none;"><div class="item">🥗 Porções na tábua</div></a>
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

    <!-- MODAL EMPRESA EDIT -->
    <div class="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Empresa</h5>
                    <a href="javascript:void(0)" onclick="fechar_modal_empresa()" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true" style="color: red;">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./empresa.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Link Imagem</label>
                            <input type="text" class="form-control" name="logo" id="logo_empresa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Link Capa</label>
                            <input type="text" class="form-control" name="capa" id="capa_empresa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome Comercial</label>
                            <input type="text" class="form-control" name="nome" id="nome_empresa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="insta_empresa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="facebook_empresa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">WhatsApp</label>
                            <input type="text" class="form-control" name="whatsapp" id="whats_empresa">
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:void(0)" onclick="fechar_modal_empresa()" class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                            <a href="javascript:void(0)" onclick="update_empresa()" class="btn btn-primary">Salvar</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- MODAL EMPRESA EDIT -->

    <!-- MODAL EDIT -->
    <div class="edit">
        <div class="modalContent">
            <a class="closeBtn" href="javascript:void(0)" onclick="fechar_modal_edit()">X</a>
            <form method="POST" action="./item.php">
                <div class="block_img">
                    <img class="img-c" src="" id="foto_produto"></img>
                    <span class="title_edit_img">Imagem</span>
                    <input type="text" name="imagem" class="link_edit_img" id="link_produto">
                </div>
                <div class="block_infos">
                    <span class="title_infos">Nome</span>
                    <input type="text" name="nome-item" class="input_edit_info" id="nome_produto">

                    <span class="title_infos">Descrição</span>
                    <input type="text" name="descricao" class="input_edit_info" id="descricao_produto">

                    <span class="title_infos">Categoria</span>
                    <input type="text" name="categoria" class="input_edit_info" id="categoria_produto">

                    <span class="title_infos">Preço</span>
                    <input type="text" name="preco" class="input_edit_info" id="preco_produto">
                    <span class="title_infos" style="margin-bottom: 15px;">ID: <input type="text" id="id_produto" disabled style="text-align: center;"></span>
                </div>

                <div class="botoes_edit">
                    <a class="btn btn-success" href="javascript:void(0);" onclick="update()" style="margin: 0 8px;" id="update" >Salvar</a>
                    <a class="btn btn-danger" href="javascript:void(0);"  onclick="excluir()" style="margin: 0 8px;" id="excluir">Excluir</a>
                </div>
            </form>
        </div>
    </div>
    <!-- /MODAL EDIT -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

