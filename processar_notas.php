<?php
// Inclua o arquivo de conexão
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados recebidos do formulário
    $aluno_id = $_POST['aluno_id'];
    $disciplina = $_POST['disciplina'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    try {
        // Preparação da declaração SQL
        $sql = "INSERT INTO notas (aluno_id, disciplina, nota1, nota2, nota3) VALUES (:aluno_id, :disciplina, :nota1, :nota2, :nota3)";
        $stmt = $pdo->prepare($sql);

        // Substituição dos parâmetros e execução da declaração
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->bindParam(':disciplina', $disciplina);
        $stmt->bindParam(':nota1', $nota1);
        $stmt->bindParam(':nota2', $nota2);
        $stmt->bindParam(':nota3', $nota3);
        $stmt->execute();

        echo "Notas adicionadas com sucesso!";
    } catch (\PDOException $e) {
        // Em caso de erro na inserção
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Se não for uma requisição POST, redirecione ou trate de outra forma
    echo "Método não permitido.";
}
