<?php
session_start();
include 'gerencie/connect.php';

$codigo_cupom = $_POST['codigo'];
$cpf_usuario = $_SESSION['CPF'];
$valor_produto = $_POST['valor_produto'];
$loja = $_POST['loja'];
$id_usuario = $_SESSION['id'];

$verificaCupom = CRUD::SELECT('','cupons','codigo=:codigo',array('codigo' => $codigo_cupom),'');

    foreach ($verificaCupom as $key => $verifica) {
    }

        if($verifica['id'] != ''){
            
            header('location: '.SITE_URL.'index.php?s=1');       //s=1 = O CUMPOM JÁ EXISTE

        }else{

            if(isset($_POST['submit'])){

                if(strlen($codigo_cupom) != 7){

                    header('location: '.SITE_URL.'index.php?s=3');
                           //s=3 = CUPOM INVÁLIDO
                }else{

                    if($valor_produto >= 300){
                        $num_sorte = rand(1,100);   
                            $verifyCupons = CRUD::SELECT('num_sorte','cupons','','','');
                                foreach ($verifyNum_sorte as $key => $verifyNum) {
                                    # code...
                                }
                        while($num_sorte == $verifyNum['num_sorte']){
                            
                            $num_sorte = rand(1,100);

                        } 
                            $params = ['nome_usuario' => $_SESSION["nome"], 'email_usuario' => $_SESSION["email"],'codigo' => $codigo_cupom, 'id_usuario' => $id_usuario ,'CPF_usuario' => $cpf_usuario, 'valor_produto' => $valor_produto, 'loja' => $loja, 'num_sorte' => $num_sorte];

                            echo $num_sorte;
                                $insertUsuario = CRUD::INSERT('cupons', $params);
                                    header('location: '.SITE_URL.'index.php?s=2&msg=Valor_da_sorte'); 
                    }else{

                        $params = ['nome_usuario' => $_SESSION["nome"], 'email_usuario' => $_SESSION["email"], 'codigo' => $codigo_cupom, 'id_usuario' => $id_usuario ,'CPF_usuario' => $cpf_usuario, 'valor_produto' => $valor_produto, 'loja' => $loja];
                            $insertUsuario = CRUD::INSERT('cupons', $params);

                                header('location: '.SITE_URL.'index.php?s=2'); 
                    }
                }
    
            }
        }



