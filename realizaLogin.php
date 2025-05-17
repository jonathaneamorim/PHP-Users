<?php
    require_once 'dbconnection.php';

    session_start();

    if (isset($_POST['emailLogin'], $_POST['senhaLogin'])) {
        if (usuarioExiste($_POST['emailLogin'])) {
            if (isValidPassword($_POST['emailLogin'], $_POST['senhaLogin'])) {
                $nome = getNome($_POST['emailLogin']);
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $_POST['emailLogin'];
                $_SESSION['logged'] = true;

                header('Location: listarUsuarios.php');
                exit();
            } else {
                echo '<script>alert("Senha incorreta!"); window.location.href="login.php";</script>';
            }
        } else {
            echo '<script>alert("E-mail não cadastrado!"); window.location.href="login.php";</script>';
        }
    } else {
        echo '<script>alert("Preencha todos os campos!"); window.location.href="login.php";</script>';
    }