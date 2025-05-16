<?php

    require_once 'dbconnection.php';

    session_start();

    // Proteção básica (opcional)
    if (!isset($_SESSION['email'])) {
        http_response_code(401);
        echo json_encode(['erro' => 'Não autorizado']);
        exit;
    }


    $conn = conectarBanco();
    

    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(['erro' => 'Erro na conexão']);
        exit;
    }

    $sql = "SELECT nome, email FROM '$USER_TABLE_NAME'";
    $resultado = $conn->query($sql);

    echo "<script>console.log('entrou aq')</script>";

    $usuarios = [];

    while ($linha = $resultado->fetch_assoc()) {
        $usuarios[] = $linha;
    }

    header('Content-Type: application/json');
    echo json_encode($usuarios);