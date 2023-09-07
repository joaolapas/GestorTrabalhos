<link rel="stylesheet" type="text/css" href="styles.css">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa_id = $_POST["tarefa_id"];

    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao)); 
    }

    $sqlSelecionarTarefa = "SELECT * FROM Tarefas WHERE id = $tarefa_id";
    $resultadoSelecionarTarefa = mysqli_query($ligacao, $sqlSelecionarTarefa);

    if ($resultadoSelecionarTarefa) {
        $linhaTarefa = mysqli_fetch_assoc($resultadoSelecionarTarefa);

        echo "<h1>Editar Tarefa</h1>";
        echo "<form method='post' action='alterar_tarefa3.php'>";
        echo "<input type='hidden' name='tarefa_id' value='" . $linhaTarefa['id'] . "'>";
        echo "Título: <input type='text' name='titulo' value='" . $linhaTarefa['titulo'] . "'><br>";
        echo "Descrição: <textarea name='descricao'>" . $linhaTarefa['descricao'] . "</textarea><br>";
        echo "Data Limite: <input type='date' name='data_limite' value='" . $linhaTarefa['data_limite'] . "'><br>";
        
        // Substitua o campo de texto por um campo select para o Estado
        echo "Estado: <select name='estado'>";
        echo "<option value='Pendente'" . ($linhaTarefa['estado'] == 'Pendente' ? ' selected' : '') . ">Pendente</option>";
        echo "<option value='Em Progresso'" . ($linhaTarefa['estado'] == 'Em Progresso' ? ' selected' : '') . ">Em Progresso</option>";
        echo "<option value='Concluída'" . ($linhaTarefa['estado'] == 'Concluída' ? ' selected' : '') . ">Concluída</option>";
        echo "</select><br>";

        echo "<input type='submit' value='Salvar Alterações'>";
        echo "</form>";
    } else {
        echo "Erro ao selecionar a tarefa: " . mysqli_error($ligacao);
    }

   
    mysqli_close($ligacao);
}
?>

<form method="get" action="index.html">
    <button type="submit">Voltar</button> 
</form>
<a class="button" href="index.html">Voltar ao Menu</a>
