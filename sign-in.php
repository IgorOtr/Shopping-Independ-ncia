<?include 'gerencie/connect.php';?>
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
    <div class="container principal">
        <div class="row principal">
            <div class="col-md-6 left-side">
                <!-- <img src="assets/img/logo.png" alt=""> -->
            </div>
            <div class="col-md-6 right-side">
                <img class="mb-5" src="assets/img/logo rbmweb.png" alt="">
                <h2>Entre para cadastrar seu cupom.</h2>
                <h4><a href="<?=SITE_URL?>cadastro.php">Criar conta</a></h4>
                
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" id="exampleFormControlInput1"
                            placeholder="Senha" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="submit" name="submit" class="form-control submitButton" id="exampleFormControlInput1">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?include 'includes/_footer.php';?>