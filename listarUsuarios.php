<?php
    session_start();

    if(!isset($_SESSION['email'], $_SESSION['nome'])) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/shared.css">
</head>

<body>
    <div class="container main-container">
        <div class="row justify-content-center">
            <div class="rounded-4 shadow p-4" style="background-color: #f8d7da;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p>Olá, <?php echo $_SESSION['nome']; ?></p>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                    <button onclick="carregarUsuarios()">Reload</button>
                </div>

                <h4 class="mb-3">Usuários cadastrados</h4>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaUsuarios">

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        function carregarUsuarios() {
            fetch('usuarios.php')
                .then(response => response.json())
                .then(dados => {
                    const tabela = document.getElementById('tabelaUsuarios');
                    tabela.innerHTML = ''; 

                    dados.forEach(usuario => {
                        const linha = document.createElement('tr');
                        linha.innerHTML = `
                            <td>${usuario.nome}</td>
                            <td>${usuario.email}</td>
                        `;
                        tabela.appendChild(linha);
                    });
                })
                .catch(erro => {
                    console.error('Erro ao carregar usuários:', erro);
                });
        }
        carregarUsuarios();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>