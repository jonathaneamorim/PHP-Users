<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/shared.css">
</head>
<body>
    <div class="container main-container">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 rounded-4 shadow p-3 mb-5" style="background-color: pink">
                <h1 class="text-center">Login</h1>
                <form class="mt-3 mb-3" id="formTeste" action="realizaLogin.php" onsubmit="return ValidarFormulario(event)" method="POST">                                 
                    <div class="form-floating">
                        <input type="text" class="form-control mt-2" name="emailLogin" id="emailLogin">
                        <label for="floatingInputGrid">E-mail</label>
                    </div>
                    <div class="form-floating">                        
                        <input type="password" class="form-control mt-2" name="senhaLogin" id="senhaLogin">
                        <label for="floatingInputGrid">Senha</label>
                    </div>                    
                    <a href="cadastro.php" class="link-center">Não tem cadastro?</a>           
                    <input type="submit" value="Login" class="btn btn-light w-100 mt-2" name="botaoLogin">      
                </form>
            </div>
        </div>
    </div>

    <script>
        function ValidarFormulario(event) {
            const email = document.getElementById('emailLogin').value.trim();
            const senha = document.getElementById('senhaLogin').value;

            if (!email || !senha) {
                alert('Por favor, preencha todos os campos.');
                event.preventDefault();
                return false;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert('E-mail inválido.');
                event.preventDefault();
                return false;
            } 

            return true;
        }
    </script>

    <?php include 'innerScripts.php'; ?>
</body>
</html>