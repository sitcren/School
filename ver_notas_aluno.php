<?php
// Inclua o arquivo de conexão
include 'conexao.php';

// Supondo que você tenha um mecanismo de autenticação e o ID do aluno esteja disponível na sessão
// Certifique-se de ajustar esta parte conforme o seu sistema de autenticação
session_start();
$aluno_id = $_SESSION['aluno_id'];

try {
    // Consulta SQL para obter as notas do aluno
    $sql = "SELECT disciplina, nota1, nota2, nota3 FROM notas WHERE aluno_id = :aluno_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':aluno_id', $aluno_id);
    $stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver notas</title>
</head>

<body>

</body>

</html>

<?php

    // Exibição dos resultados em uma tabela
    echo "<table border='1'>
    <tr>
        <th>Disciplina</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Nota 3</th>
    </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
        <td>{$row['disciplina']}</td>
        <td>{$row['nota1']}</td>
        <td>{$row['nota2']}</td>
        <td>{$row['nota3']}</td>
    </tr>";
    }

    echo "
</table>";
} catch (\PDOException $e) {
    // Em caso de erro na consulta
    echo "Erro: " . $e->getMessage();
}