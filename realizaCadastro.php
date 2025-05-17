<?php
    require_once 'dbconnection.php';

    if(!usuarioExiste($_POST['emailCadastro'])) {
        cadastrarUsuario($_POST['nomeCadastro'], $_POST['emailCadastro'], $_POST['senhaCadastro']);
        exit;
    } else {
        echo '<script>alert("Esse e-mail já está cadastrado! Realize o login!"); window.location.href="login.php";</script>';
    }
