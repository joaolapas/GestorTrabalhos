<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao));
    }

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $funcionarioId = $_POST['funcionario'];
    $data = $_POST['data'];
    $prazo = $_POST['prazo'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO tarefas (titulo, descricao, funcionario, data, prazo, estado) VALUES ('$titulo', '$descricao', $funcionarioId, '$data', '$prazo', '$estado')";

    if (mysqli_query($ligacao, $sql)) {
        header("Location: index.html");
        exit();
    } else {
        echo "Erro ao inserir tarefa: " . mysqli_error($ligacao);
    }

    mysqli_close($ligacao);
}
?>
