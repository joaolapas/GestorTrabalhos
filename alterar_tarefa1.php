<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form method="post" action="alterar_tarefa2.php">
        <label for="tarefa_id">Selecione a Tarefa a Editar:</label>
        <select name="tarefa_id" id="tarefa_id">
            <?php
            $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

            if ($ligacao->connect_error) {
                die(mysqli_error($ligacao)); 
            }

            $sqlTodasTarefas = "SELECT id, titulo FROM Tarefas";
            $resultadoTodasTarefas = mysqli_query($ligacao, $sqlTodasTarefas);

            if ($resultadoTodasTarefas) {
                while ($linhaTarefa = mysqli_fetch_assoc($resultadoTodasTarefas)) {
                    echo "<option value='" . $linhaTarefa['id'] . "'>" . $linhaTarefa['titulo'] . "</option>";
                }
            } else {
                echo "Erro ao listar as tarefas: " . mysqli_error($ligacao);
            }

            mysqli_close($ligacao);
            ?>
        </select>
        <input type="submit" value="Editar Tarefa">
    </form>
    
    <a class="button" href="index.html">Voltar ao Menu</a>
</body>
</html>
