<?php
session_start();
include 'gerencie/connect.php';

$email = $_POST['email'];
$senha = md5($_POST['senha']);



// as variáveis login e senha recebem os dados digitados na página anterior
// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$select = $DB->query("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");
/*$result = mysql_query("SELECT * FROM usuario WHERE email_usu = '$email' AND senha_usu = '$senha'");
$resultado = mysql_fetch_assoc($result);
*/
$result = $select->fetch(PDO::FETCH_ASSOC);

//var_dump($result);die();
$rowCount = $select->rowCount();

if ($rowCount > 0) {
    if ($result["status"] == 0) {
     
        $_SESSION["nome"] = $result["nome"];
        $_SESSION["email"] = $result["email"];
        $_SESSION['senha'] = $result["senha"];
        $_SESSION["id"] = $result["id"];
        $_SESSION["status"] = $result["status"];
        $_SESSION['CPF'] = $result["CPF"];

        header('location:' . SITE_URL . 'index.php');
        die();
    } elseif ($result['status'] == 1) {
        $_SESSION['error'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Usuário bloqueado. Favor confirmar o e-mail que enviamos.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header('location:' . SITE_URL . 'sign-in.php?status=0');
        exit();
    }
} else {
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Senha inválida. clique em "esqueceu sua senha".
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    header('location:' . SITE_URL . 'sign-in.php?status=1');
    exit();
}