<link rel="stylesheet" href="styles.css">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario_id = $_POST["funcionario"];

    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao)); 
    }

    $sqlSelecionarFuncionario = "SELECT * FROM Funcionarios WHERE id = $funcionario_id";
    $resultadoSelecionarFuncionario = mysqli_query($ligacao, $sqlSelecionarFuncionario);

    if ($resultadoSelecionarFuncionario) {
        $linhaFuncionario = mysqli_fetch_assoc($resultadoSelecionarFuncionario);

        echo "<h1>Editar Funcionário</h1>";
        echo "<form method='post' action='alterar_funcionario3.php'>";
        echo "<input type='hidden' name='funcionario_id' value='" . $linhaFuncionario['funcionario_id'] . "'>";
        echo "Primeiro Nome: <input type='text' name='primeiroNome' value='" . $linhaFuncionario['primeiroNome'] . "'><br>";
        echo "Último Nome: <input type='text' name='ultimoNome' value='" . $linhaFuncionario['ultimoNome'] . "'><br>";
        echo "Cargo: <input type='text' name='funcao' value='" . $linhaFuncionario['funcao'] . "'><br>";
        echo "Data Nascimento: <input type='date' name='dataNascimento' value='" . $linhaFuncionario['dataNascimento'] . "'><br>";
        echo "E-mail: <input type='email' name='email' value='" . $linhaFuncionario['email'] . "'><br>";
        echo "<input type='submit' value='Salvar Alterações'>";
        echo "</form>";
    } else {
        echo "Erro ao selecionar o funcionário: " . mysqli_error($ligacao);
    }

    mysqli_close($ligacao);
}
?>
