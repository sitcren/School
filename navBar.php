<?php

if (isset($nomeUsuario)) {
    include 'navBar.php';
}


// Inclua o arquivo de conexão
include 'conexao.php';

// Supondo que o ID do aluno está armazenado na sessão após o login
$aluno_id = isset($_SESSION['aluno_id']) ? $_SESSION['aluno_id'] : '';

// Consulta SQL para obter o nome do aluno
$sql = "SELECT nome FROM alunos WHERE id = :aluno_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':aluno_id', $aluno_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtenha o nome do aluno
$nomeUsuario = isset($row['nome']) ? $row['nome'] : '';

?>
<header class="container mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Notas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alunos</a>
                    </li>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </ul>

                <?php


                echo '<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            ' . $nomeUsuario . '
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cadastroNotas.php">Add Notas</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Log Out</a></li>
        </ul>
      </li>';
                ?>
            </div>
        </div>
    </nav>
</header>