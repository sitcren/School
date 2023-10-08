<?php
// Configurações de conexão
$host = 'localhost';
$db = 'school';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Configurações do DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Configurações do PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Criação da instância do PDO
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Agora você pode usar $pdo para interagir com o banco de dados
    // echo "Conexão bem-sucedida!";
} catch (\PDOException $e) {
    // Em caso de erro na conexão
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}