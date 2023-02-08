<?
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {

    session_destroy();

    unset($_SESSION['nome']);

    unset($_SESSION['email']);

    unset($_SESSION['senha']);

    unset($_SESSION["tipo"]);

    unset($_SESSION["id"]);

    unset($_SESSION["bloqueado"]);

    session_unset();

    echo '<script>location.href="sign-in.php"</script>';
}