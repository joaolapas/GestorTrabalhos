<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o ID do funcionário a ser eliminado do formulário
    $funcionario_id = $_POST["funcionario_id"];

    // Realize a validação necessária, como verificar se o funcionário existe

    // Conecta-se ao banco de dados
    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    // Verifica se houve erro na conexão
    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao)); // Encerra a execução do script e exibe o erro
    }

    // Verifica se o funcionário possui tarefas associadas
    $sqlVerificarTarefas = "SELECT COUNT(*) as total FROM Tarefas WHERE funcionario = $funcionario_id";
    $resultadoVerificarTarefas = mysqli_query($ligacao, $sqlVerificarTarefas);

    if ($resultadoVerificarTarefas) {
        $linhaVerificarTarefas = mysqli_fetch_assoc($resultadoVerificarTarefas);
        $totalTarefas = $linhaVerificarTarefas['total'];

        if ($totalTarefas > 0) {
            echo "Este funcionário possui $totalTarefas tarefas associadas.<br>";
            echo "É necessário eliminar todas as tarefas associadas primeiro.<br>";
            echo "... redirecionando ...<br>";
        } else {
            $sqlExcluirFuncionario = "DELETE FROM Funcionarios WHERE id = $funcionario_id";

            if (mysqli_query($ligacao, $sqlExcluirFuncionario)) {
                echo "Funcionário excluído com sucesso.";
            } else {
                echo "Erro ao excluir o funcionário: " . mysqli_error($ligacao);
            }
        }
    } else {
        echo "Erro ao verificar tarefas: " . mysqli_error($ligacao);
    }

    mysqli_close($ligacao);

    echo "<script>";
    echo "setTimeout(function() { window.location.href = 'index.html'; }, 3500);";
    echo "</script>";
}
?><a class="button" href="index.html">Voltar ao Menu</a>
