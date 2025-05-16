<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="/styles/shared.css">    
</head>
<body>
    <div class="container main-container">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 rounded-4 shadow p-3 mb-5" style="background-color: pink">
                <h1 class="text-center">Cadastre-se!</h1>
                <form class="mt-3 mb-3" id="formTeste" action="realizaCadastro.php" onsubmit="return ValidarFormulario(event)" method="POST">                
                    <div class="form-floating">
                        <input type="text" class="form-control mt-2" name="nomeCadastro" id="nomeCadastro">
                        <label for="floatingInputGrid">Nome</label>
                    </div>                    
                    <div class="form-floating">
                        <input type="text" class="form-control mt-2" name="emailCadastro" id="emailCadastro">
                        <label for="floatingInputGrid">E-mail</label>
                    </div>
                    <div class="form-floating">                        
                        <input type="password" class="form-control mt-2" name="senhaCadastro" id="senhaCadastro">
                        <label for="floatingInputGrid">Senha</label>
                    </div>
                    <div class="form-floating">                        
                        <input type="password" class="form-control mt-2" name="confirmarSenhaCadastro" id="confirmarSenhaCadastro">
                        <label for="floatingInputGrid">Confirmar senha</label>
                    </div>
                    <a href="login.php" class="link-center">Já sou cadastrado</a>
                    <input type="submit" value="Cadastrar"  class="btn btn-light w-100 mt-2"  />                    
                </form>
            </div>
        </div>
    </div>

    <script>
        function ValidarFormulario(event) {
            const nome = document.getElementById('nomeCadastro').value.trim();
            const email = document.getElementById('emailCadastro').value.trim();
            const senha = document.getElementById('senhaCadastro').value;
            console.log(senha);
            const confirmarSenha = document.getElementById('confirmarSenhaCadastro').value;

            if (!nome || !email || !senha || !confirmarSenha) {
                alert('Por favor, preencha todos os campos.');
                event.preventDefault();
                return false;
            }

            if (senha !== confirmarSenha) {
                alert('As senhas não são iguais!');
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

     <?php

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>