<?php
// Inclua o arquivo de conexão
include 'conexao.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados recebidos do formulário
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    try {
        // Verificar as credenciais do aluno
        $sql = "SELECT id, senha FROM alunos WHERE matricula = :matricula";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($aluno && password_verify($senha, $aluno['senha'])) {
            // Login bem-sucedido, armazenar o ID do aluno na sessão
            $_SESSION['aluno_id'] = $aluno['id'];

            // Redirecionar para a página de notas ou qualquer outra página desejada
            header('Location: ver_notas_aluno.php');
            exit();
        } else {
            // Credenciais inválidas
            echo "Matrícula ou senha incorretas.";
        }
    } catch (\PDOException $e) {
        // Em caso de erro na consulta
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Se não for uma requisição POST, redirecione ou trate de outra forma
    echo "Método não permitido.";
}