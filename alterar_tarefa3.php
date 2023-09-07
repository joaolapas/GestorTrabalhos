<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa_id = $_POST["tarefa_id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $data_limite = $_POST["data_limite"];
    $estado=$_POST["estado"];

    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao)); 
    }

    $sqlAtualizarTarefa = "UPDATE Tarefas SET titulo = '$titulo', descricao = '$descricao', prazo = '$data_limite', estado= '$estado' WHERE id = $tarefa_id";

    if (mysqli_query($ligacao, $sqlAtualizarTarefa)) {
        echo "Tarefa atualizada com sucesso. Redirecionando...";
        header("refresh:3;url=alterar_tarefa1.php"); 
    } else {
        echo "Erro ao atualizar a tarefa: " . mysqli_error($ligacao);
    }

    mysqli_close($ligacao);
}
?>
