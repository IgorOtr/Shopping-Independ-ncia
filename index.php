<?
    include 'includes/_head.php';
    include 'includes/_sessions.php';
    include 'gerencie/connect.php';
    $id = $_SESSION['id'];
    $query = CRUD::SELECT('','usuario','id=:id',array('id' => $id),'');
            foreach($query as $key => $queryUser){

            }
    


                    

?>

<body>
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="index.php">
                <img style="width: 120px;" src="assets/img/logo.png" alt="">
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <!-- <a class="leaveButton" href="logout.php">Sair</a> -->
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle leaveButton" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Olá, <?= $_SESSION["nome"]?></a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php"><i class="las la-sign-out-alt"></i> Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
    </nav>
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-md-12">
                <h1>Shopping Independência</h1>
            </div>
        </div>
        <div class="row">
            <?if($queryUser['nivel'] == 1){?>
            <div class="col-md-6 colForm">
                <form action="insert_cupom.php" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Código do CUPOM <small>(CUPONS DE ATÉ 7
                                DÍGITOS)</small></label>
                        <input name="codigo" type="text" class="form-control" id="validationCustom01"
                            placeholder="Digite o código do CUPOM" required>

                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">CPF</label>
                        <input name="CPF_usuario" type="text" class="form-control" id="validationCustom02"
                            placeholder="CPF" value="<?=$queryUser['CPF']?>" required disabled>

                    </div>
                    <div class="col-md-3">
                        <label for="validationCustomUsername" class="form-label">Valor do produto</label>
                        <div class="input-group has-validation">
                            <input name="valor_produto" type="text" class="form-control" id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend" placeholder="R$ xxx,xx" required>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label for="validationCustom03" class="form-label">Loja</label>
                        <input name="loja" type="text" class="form-control" id="validationCustom03"
                            placeholder="Informe a loja aonde foi comprado" required>
                    </div>
                    <div class="col-12">
                        <input name="submit" class="btn btn-primary" type="submit" value="Cadastrar Cupom"></input>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>CUPOM CADASTRADO</th>
                            <th>VALOR DO PRODUTO</th>
                            <th>LOJA</th>
                            <th>NÚMERO DA SORTE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?      
                            $selectCupons = CRUD::SELECT('','cupons','id_usuario=:id_usuario',array('id_usuario' => $id),'');
                                foreach ($selectCupons as $key => $selectValues) {
                                    # code...
                                
                        ?>
                        <tr>
                            <td><?=$selectValues['codigo']?></td>
                            <td><?= 'R$'.' '.$selectValues['valor_produto']?></td>
                            <td><?=$selectValues['loja']?></td>
                            <td><?=$selectValues['num_sorte']?></td>
                        </tr>
                        <?}?>
                    </tbody>
                </table>
            </div>
            <?}elseif($queryUser['nivel'] == 2){?>
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <form action="" method="post" style="width: 40%;">
                    <div class="input-group">
                        <input name="busca" type="search" class="form-control rounded" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" />
                        <input type="submit" name="submit" class="btn btn-outline-primary" value="Search"></input>
                    </div>
                </form>
            </div>
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">


                    <?if(isset($_POST['submit'])){
                        $busca = $_POST['busca'];
                            $queryFiltro = $DB->prepare('SELECT * FROM cupons WHERE valor_produto >=300 AND email_usuario LIKE ? OR num_sorte LIKE ?');
                                $queryFiltro->execute(array('%'.$busca.'%', '%'.$busca.'%'));
                    ?>


                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NOME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">CUPONS</th>
                                <th scope="col">NÚMEROS DA SORTE</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?foreach ($queryFiltro as $key => $filtroValues){?>
                                <tr>
                                    <td><?=$filtroValues['nome_usuario']?></td>
                                    <td><?=$filtroValues['email_usuario']?></td>
                                    <td><?=$filtroValues['codigo']?></td>
                                    <td><?=$filtroValues['num_sorte']?></td>
                                </tr>
                            <?}?>
                        </tbody>
                    </table>
                    <?}else{
                            $selectTable = CRUD::SELECT('','cupons','','','');  
                         
                    ?>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NOME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">CUPONS</th>
                                <th scope="col">NÚMEROS DA SORTE</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?
                                    foreach ($selectTable as $key => $table_values) {
                                ?>
                            <tr>
                                <td><?=$table_values['nome_usuario']?></td>
                                <td><?=$table_values['email_usuario']?></td>
                                <td><?=$table_values['codigo']?></td>
                                <td><?=$table_values['num_sorte']?></td>
                            </tr>

                            <?}?>


                        </tbody>
                    </table>
                    <?}?>


                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button onclick="sortear()" id="fazer_sorteio" class="sorteio">Realizar sorteio</button>
                </div>
            </div>
            <?}?>
        </div>
    </div>

    <script>

        const btn = document.getElementById("fazer_sorteio");
        
            function sortear(){
                alert("O número sorteado é: <?=$num_sorteio = rand(1,100)?>");
                btn.setAttribute("disabled", "disabled");
            }
            
    </script>

    
    <?include 'includes/_footer.php';?>