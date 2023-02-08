<?
    session_start();

    session_destroy();

    unset($_SESSION['nome']);

    unset($_SESSION['email']);

    unset($_SESSION['senha']);

    unset($_SESSION["id"]);

    unset($_SESSION["CPF"]);

    unset($_SESSION["status"]);

    session_unset();

    echo '<script>location.href="sign-in.php"</script>';