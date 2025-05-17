<?php
    session_start();

    include 'dbconnection.php';

    if(isset($_SESSION['email'], $_SESSION['nome'])) {
        header('Location: listarUsuarios.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">        
    <link rel="stylesheet" type="text/css" href="styles/shared.css">    
</head>

<body>
    <div class="container main-container">
        <div class="row justify-content-center w-100">            
            <div class="col-md-6 rounded-4 shadow p-3 mb-5" style="background-color: #f8d7da">
                <h1 class="text-center">Seja bem vindo!</h1>       
                <hr>         
                <a href="cadastro.php" class="link-center">Não tem cadastro?</a>           
                <a href="login.php" class="link-center">Já sou cadastrado</a>                                        
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>