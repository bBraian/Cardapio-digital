<?php
include('./header.php');
$sql = $pdo->query("SELECT link_foto, nome_item, descricao, preco, id FROM bas_itens WHERE categoria = 2");
?>

<main>
    <div class="container-products">
        <!-- CATEGORY -->
        <div class="container-category"> 🍟Porções (Cat 2)</div>
        <!-- /CATEGORY -->

        <!-- ADICIONAR NOVO -->
        <hr class="separator">
        <a class="addbtn" href="javascript:void(0)" onclick="add_item()">
            <i class="fas fa-plus fa-2x" style="color: white;"></i>
        </a>
        <!-- /ADICIONAR NOVO -->

        <?php
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <!-- PRODUCTS -->
            <hr class="separator">
            <div class="product-container">
                <div class="product">
                    <!-- IMAGEM DO PRODUTO -->
                    <div class="product-img" style="background-image: url('<?= $linha['link_foto']; ?>')"></div>
                    <!-- /IMAGEM DO PRODUTO -->
                    <div class="product-info">
                        <div>
                            <!-- TÍTULO E DESCRIÇÃO -->
                            <div class="product-title"><?= $linha['nome_item']; ?></div>
                            <div class="product-description"><?= $linha['descricao']; ?></div>
                            <div class="dline"></div>
                        </div> <!-- /TÍTULO E DESCRIÇÃO -->
                        <!-- PREÇO E BTN -->
                        <div class="priceandbtn">
                            <!-- PREÇO -->
                            <div class="price"><?= $linha['preco']; ?></div>
                            <!-- /PREÇO -->
                            <a class="btn btn-dark" href="javascript:void(0)" onclick="edit_item(<?= $linha['id']; ?>)"><i class="far fa-edit"></i></a>
                        </div>
                        <!-- /PREÇO E BTN -->

                    </div>
                </div>
            </div>
            <!-- /PRODUCTS -->
        <?php } ?>

    </div>
</main>

<script src="assets/js/javascript.js"></script>

</body>

</html>