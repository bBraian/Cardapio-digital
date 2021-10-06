var modal = document.querySelector('.modal');
var edit = document.querySelector('.edit');
var btn_close = document.getElementById('btn_close');
var img_modal = document.querySelector('.img-c');

/* JS EMPRESA */
function fechar_modal_empresa() {
    modal.style.display = 'none';
    
    $("#logo_empresa").val('');
    $("#capa_empresa").val('');
    $("#nome_empresa").val('');
    $("#whats_empresa").val('');
    $("#facebook_empresa").val('');
    $("#insta_empresa").val('');
}

function consulta_empresa(empresa) {
    modal.style.display = 'block';
    var formData = new FormData();

    formData.append('empresa', empresa);

    $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'POST',
        url: 'consulta_empresa.php',
        success: function (response) {
            var json = JSON.parse(response);

            if (json.erro === 'S') {
                console.log(json.mensagem);

            } else {
                var nome = json.nome;
                var whatsapp = json.whatsapp;
                var instagram = json.instagram;
                var facebook = json.facebook;
                var logo = json.logo;
                var capa = json.capa;

                $("#logo_empresa").val(logo);
                $("#capa_empresa").val(capa);
                $("#nome_empresa").val(nome);
                $("#whats_empresa").val(whatsapp);
                $("#facebook_empresa").val(facebook);
                $("#insta_empresa").val(instagram);
            }
        },
        error: function (response) {
            var json = JSON.parse(response);
            console.log("Erro de comunicacao: " + json);
        }
    });
}

function update_empresa() {
    var ne_logo = $("#logo_empresa").val();
    var ne_capa =  $("#capa_empresa").val();
    var ne_nome = $("#nome_empresa").val();
    var ne_insta = $("#insta_empresa").val();
    var ne_facebook = $("#facebook_empresa").val();
    var ne_whats = $("#whats_empresa").val();

    var formData = new FormData();

    formData.append('ne_logo', ne_logo);
    formData.append('ne_capa', ne_capa);
    formData.append('ne_nome', ne_nome);
    formData.append('ne_insta', ne_insta);
    formData.append('ne_facebook', ne_facebook);
    formData.append('ne_whats', ne_whats);

    $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'POST',
        url: 'update_empresa.php',
        success: function () {
            alert('Atualizado com sucesso!');
            fechar_modal_empresa();
            location.reload();
        },
        error: function () {
            console.log("Erro de comunicacao");
        }
    });
}
/* JS EMPRESA */


/* JS PRODUTO */


function fechar_modal_edit() {
    edit.style.display = 'none';

    $("#link_produto").val('');
    $("#nome_produto").val('');
    $("#descricao_produto").val('');
    $("#preco_produto").val('');
    $("#categoria_produto").val('');
    $("#id_produto").val('');

    var img = document.querySelector(".img-c");
    img.setAttribute('src', '');
}


function add_item() {
    edit.style.display = 'block';
    btn_close.style.display = 'none';
    img_modal.style.display = 'none';
}

function edit_item(id) {
    consulta_produto(id);

    //Abre o modal para editar
    edit.style.display = 'block';
    btn_close.style.display = 'block';
    img_modal.style.display = 'block';
}

function consulta_produto(id) {
    var formData = new FormData();

    formData.append('id', id);

    $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'POST',
        url: 'produto_ajax.php',
        success: function (response) {
            var json = JSON.parse(response);

            if (json.erro === 'S') {
                console.log(json.mensagem);

            } else {
                var foto = json.foto;
                var nome = json.nome;
                var descricao = json.descricao;
                var preco = json.preco;
                var categoria = json.categoria;
                var id = json.id;

                $("#link_produto").val(foto);
                $("#nome_produto").val(nome);
                $("#descricao_produto").val(descricao);
                $("#preco_produto").val(preco);
                $("#categoria_produto").val(categoria);
                $("#id_produto").val(id);

                var img = document.querySelector(".img-c");
                img.setAttribute('src', foto);

            }
        },
        error: function (response) {
            var json = JSON.parse(response);
            console.log("Erro de comunicacao: " + json);
        }
    });
}

function excluir() {

    if (confirm('Deseja excluir este item?')) {

        var id = $("#id_produto").val();

        var formData = new FormData();

        formData.append('id', id);

        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'POST',
            url: 'excluir.php',
            success: function () {
                alert('Registro excluído com sucesso!');
                edit.style.display = 'none';
                location.reload();
            },
            error: function () {
                console.log("Erro de comunicacao");
            }
        });

    }
}

function update() {
    var fotoU = $("#link_produto").val();
    var nomeU =  $("#nome_produto").val();
    var descricaoU = $("#descricao_produto").val();
    var precoU = $("#preco_produto").val();
    var categoriaU = $("#categoria_produto").val();
    var idU = $("#id_produto").val();

    var formData = new FormData();

    formData.append('fotoU', fotoU);
    formData.append('nomeU', nomeU);
    formData.append('descricaoU', descricaoU);
    formData.append('precoU', precoU);
    formData.append('categoriaU', categoriaU);
    formData.append('idU', idU);

    $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'POST',
        url: 'update.php',
        success: function () {
            alert('Atualizado com sucesso!');
            edit.style.display = 'none';
            location.reload();
        },
        error: function () {
            console.log("Erro de comunicacao");
        }
    });
}