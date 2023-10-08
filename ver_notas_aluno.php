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


        <!-- Link Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>

        <?php
        include 'navBar.php'
        ?>


        <section class="container mt-5">
        <?php



        // Exibição dos resultados em uma tabela
        echo "<table border='1' class='table'>
<tr>
<th>Disciplina</th>
<th>Nota 1</th>
<th>Nota 2</th>
<th>Nota 3</th>
<th>Média</th>
</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Calcular a média
            $media = ($row['nota1'] + $row['nota2'] + $row['nota3']) / 3;

            echo "<tr>
    <td>{$row['disciplina']}</td>
    <td>{$row['nota1']}</td>
    <td>{$row['nota2']}</td>
    <td>{$row['nota3']}</td>
    <td>{$media}</td>
    </tr>";
        }

        echo "</table>";
    } catch (\PDOException $e) {
        // Em caso de erro na consulta
        echo "Erro: " . $e->getMessage();
    }
        ?>
        </section>


        <!-- Link 2 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>

    </html>