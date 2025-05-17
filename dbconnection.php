<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'admin');
define('DB_NAME', 'main');
define('USER_TABLE_NAME', 'USUARIOS');

// Função padrão para conexão com o banco de dados
function conectarBanco() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function generateDatabase() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
    $sql = "SHOW DATABASES LIKE '" . DB_NAME . "'";
    $result = $conn->query($sql);

    if (!($result && $result->num_rows > 0)) {
        $createScript = "CREATE DATABASE " . DB_NAME;
        if ($conn->query($createScript) === TRUE) {
            echo "<script>console.log('Database created successfully')</script>";
        }
    }
    $conn->close();
}

function generateTables() {
    $conn = conectarBanco();
    $verifyTableExists = "SHOW TABLES LIKE '" . USER_TABLE_NAME . "'";
    $result = $conn->query($verifyTableExists);

    if (!($result && $result->num_rows > 0)) {
        $createTable = "CREATE TABLE IF NOT EXISTS `" . USER_TABLE_NAME . "` (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            senha VARCHAR(200) NOT NULL
        )";
        if ($conn->query($createTable) === TRUE) {
            echo "<script>console.log('Table created successfully')</script>";
        }
    } 
    
    $conn->close();
}

function usuarioExiste($email) {
    $conn = conectarBanco(); 
    $sql = "SELECT COUNT(*) FROM `" . USER_TABLE_NAME . "` WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($quantidade);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    return $quantidade > 0;
}

function cadastrarUsuario($nome, $email, $senha) {
    $conn = conectarBanco();
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO `" . USER_TABLE_NAME . "` (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $hash);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: login.php');
    exit();
}

function getNome($email) {
    if (usuarioExiste($email)) {
        $conn = conectarBanco();
        $stmt = $conn->prepare("SELECT nome FROM `" . USER_TABLE_NAME . "` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($nome);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        return $nome;
    }
    return null;
}

function isValidPassword($email, $senha) {
    if (usuarioExiste($email)) {
        $conn = conectarBanco();
        $stmt = $conn->prepare("SELECT senha FROM `" . USER_TABLE_NAME . "` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($db_pass);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        return password_verify($senha, $db_pass);
    }
    return false;
}

generateDatabase();
generateTables();
