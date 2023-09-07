<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Eliminar Tarefa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
   
    <a href="index.html" target="_self">Voltar ao menu</a>

    <h1>Eliminar Tarefa</h1>

    <form method="post" action="eliminar_tarefas.php">
        <label for="tarefa">Selecione a Tarefa:</label>
        <select name="tarefa" id="tarefa">
        <?php
$ligacao = mysqli_connect("localhost", "root", "", "tarefas");

if ($ligacao->connect_error) {
    die(mysqli_error($ligacao));
}

$sqlTarefas = "SELECT id, titulo FROM Tarefas";
$resultadoTarefas = mysqli_query($ligacao, $sqlTarefas);

if (mysqli_num_rows($resultadoTarefas) > 0) {
    while ($linhaTarefa = mysqli_fetch_assoc($resultadoTarefas)) {
        echo "<option value='" . $linhaTarefa['id'] . "'>" . $linhaTarefa['titulo'] . "</option>";
    }
}

mysqli_close($ligacao);
?>

        </select>
        <input type="submit" value="Eliminar Tarefa">
    </form>
    <a class="button" href="index.html">Voltar ao Menu</a>
</body>
</html>
