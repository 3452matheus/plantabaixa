<?php
    session_start();//inicializando a session/sessao
    ob_start();//limpa os ultimos registro da session
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRSECCO - Cadastro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body style="text-transform: uppercase;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand my-2"  href="#"></a>
        <a class="navbar-brand my-2" >A casa do Sonho</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">login(Pagina atual)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="caduser.php">cadatrar</a>
              </li>
           
          </ul>
          
        </div>
      </nav>
      <br><br>
        <div class="h1 text-center">Cadastrar Usuário</div>
        <div class="container ">
        <div class=" border border-success shadow-lg p-3 mb-5 bg-white rounded">
        <form action="" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nome</span>
                </div>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" aria-label="nome" aria-describedby="basic-addon1" require>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">E-mail</span>
                </div>
                <input type="text" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1" require>
            </div>
            <!-- cpf -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cpf</span>
                </div>
                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1" require>
            </div>
            <input type="submit" class="btn btn-primary" value="Salvar" name="salvar">
        </form>
    </div>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
    /* Código para Cadastrar */
    require './Conn.php';
    require './User.php';
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData['salvar'])) {
        //var_dump($formData);
        $insertUser = new User();
        $insertUser->formData = $formData;
        $valor = $insertUser->insert();

        if ($valor) {
            $_SESSION['msg'] = "<p style='color:green'>Registro cadastrado com sucesso!</p>";
            header("Location: index.php");
        } else {
            $_SESSION['msg'] = "<p style='color:red'>Ocorreu Erro!</p>";
        }
    }
?>