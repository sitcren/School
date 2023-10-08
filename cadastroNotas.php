<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Notas</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php
    include 'navBar.php'
    ?>

    <!-- Form Cadastro de Notas  -->
    <section class="container mt-5">
        <form method="post" action="processar_notas.php">
            <div class="mb-3">
                <label for="disciplina" class="form-label">Disciplina</label>
                <input type="text" class="form-control" name="disciplina">
            </div>
            <div class="mb-3">
                <label for="nota1" class="form-label">Nota 1</label>
                <input type="number" class="form-control" name="nota1">
            </div>
            <div class="mb-3">
                <label for="nota2" class="form-label">Nota 2</label>
                <input type="number" class="form-control" name="nota2">
            </div>
            <div class="mb-3">
                <label for="nota3" class="form-label">Nota 3</label>
                <input type="number" class="form-control" name="nota3">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </section>

    <!-- Link 2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>