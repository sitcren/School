<?php
// Inclua o arquivo de conexão
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados recebidos do formulário
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        // Preparação da declaração SQL
        $sql = "INSERT INTO alunos (nome, matricula, senha) VALUES (:nome, :matricula, :senha)";
        $stmt = $pdo->prepare($sql);

        // Substituição dos parâmetros e execução da declaração
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':senha', $senha_hash);
        $stmt->execute();

        echo "Dados inseridos com sucesso!";
    } catch (\PDOException $e) {
        // Em caso de erro na inserção
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Se não for uma requisição POST, redirecione ou trate de outra forma
    echo "Método não permitido.";
}