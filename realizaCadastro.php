<?php
    require_once 'dbconnection.php';

    cadastrarUsuario($_POST['nomeCadastro'], $_POST['emailCadastro'], $_POST['senhaCadastro']);

    