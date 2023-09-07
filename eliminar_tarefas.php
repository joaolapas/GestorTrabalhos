<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa_id = $_POST["tarefa"];

    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao)); 
    }

    $sqlExcluirTarefa = "DELETE FROM Tarefas WHERE id = $tarefa_id";

    if (mysqli_query($ligacao, $sqlExcluirTarefa)) {
        echo "Tarefa excluída com sucesso.";
        
        echo '<script>
                setTimeout(function() {
                    window.location.href = "index.html";
                }, 3000);
              </script>';
    } else {
        echo "Erro ao excluir a tarefa: " . mysqli_error($ligacao);
    }

    mysqli_close($ligacao);
}
?><a class="button" href="index.html">Voltar ao Menu</a>
