<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-12 text-center">
                <h2>Crie sua conta para cadastrar seus CUPONS</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="insert_cadastro.php" method="post">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input name="nome" type="text" id="form6Example2" class="form-control" />
                                <label class="form-label" for="form6Example2">Nome</label>
                            </div>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input name="email" type="text" id="form6Example3" class="form-control" />
                        <label class="form-label" for="form6Example3">Email</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input name="senha" type="password" id="form6Example4" class="form-control" />
                        <label class="form-label" for="form6Example4">Senha</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input name="CPF" type="number" id="form6Example5" class="form-control" />
                        <label class="form-label" for="form6Example5">CPF</label>
                    </div>

                    <input name="submit" type="submit" class="btn btn-primary btn-block mb-4" value="Cadastrar"></input>
                </form>
            </div>
        </div>
    </div>
    <?include 'includes/_footer.php';?>