<?php

    require_once 'dbconnection.php';

    session_start();

    if (!isset($_SESSION['email'])) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['erro' => 'Não autorizado']);
        exit;
    }

    $conn = conectarBanco();

    if ($conn->connect_error) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(['erro' => 'Erro na conexão']);
        exit;
    }

    $sql = "SELECT nome, email FROM ". USER_TABLE_NAME;
    $resultado = $conn->query($sql);

    if (!$resultado) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(['erro' => 'Erro na consulta SQL']);
        exit;
    }

    $usuarios = [];

    while ($linha = $resultado->fetch_assoc()) {
        $usuarios[] = $linha;
    }

    header('Content-Type: application/json');
    echo json_encode($usuarios);
    exit;
