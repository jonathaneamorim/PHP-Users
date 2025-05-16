<?php
    require_once 'dbconnection.php'; // Ou include_once

    session_start();

    if(isset($_POST['emailLogin'], $_POST['senhaLogin'])) {
        if(usuarioExiste($_POST['emailLogin'])) {
            if(isValidPassword($_POST['emailLogin'], $_POST['senhaLogin'])) {
                $nome = getNome($_POST['emailLogin']);
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $_POST['emailLogin'];
                $_SESSION['logged'] = true;
                
                header('Location: listarUsuarios.php');
                exit();
            } else {
                echo 'Senha incorreta.';
            } 
        }  else {
            echo 'Usuário não existe!';
        }
    } else {
        echo 'Preencha todos os campos';
    }
    