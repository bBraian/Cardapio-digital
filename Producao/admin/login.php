<?php


include('./../conecao.php');

$login = $_POST['username'];
$senha = $_POST['pass'];

$sql = $pdo->prepare("SELECT * FROM sec_empresa WHERE login = ?");
$sql->execute([$login]);

    if($sql->rowCount() == 1){
        $info = $sql->fetch();
        if($senha == $info['senha']){
            $_SESSION['login'] = true; //Se for true então o usuário pode ficar logado.
            $_SESSION['id'] = $info['id']; //Recuperamos o id.
            $_SESSION['usuario'] = $info['login']; //Recuperamos o usuário.
            header("Location: ./backend/hamburgueres.php");  //Redirecionamos o usuário para uma página privada que somente usuários logados podem acessar.
            die();
        }else{
            ?>
            <script>alert('Senha incorreta! Tente novamente');</script>
            <?php
        }
    }else{
        ?>
            <script>alert('Usuário não encontrado!');</script>
        <?php
    }

?>