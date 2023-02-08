
<?
include 'gerencie/connect.php';

if (isset($_POST['submit'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
        if(strlen($_POST['CPF']) != 11){
           echo 'CPF inválido';
        }else{
            $cpf = $_POST['CPF'];
        }

    $params = array('nome' => $nome, 'email' => $email, 'senha' => $senha, 'CPF' => $cpf);
        $insertUsuario = CRUD::INSERT('usuario',$params);

            header('location:'.SITE_URL.'sign-in.php');
    }