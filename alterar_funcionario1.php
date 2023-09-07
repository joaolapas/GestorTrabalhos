<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Alterar Funcionário</title>
</head>
<body>
    <h1>Editar Funcionário</h1>
    <form method="post" action="alterar_funcionario2.php">
        <label for="funcionario">Selecione o funcionário a ser alterado:</label>
        <select name="funcionario" id="funcionario"><?php
            $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

            if ($ligacao->connect_error) {
                die(mysqli_error($ligacao)); 
            }

            $sqlFuncionarios = "SELECT id, primeiroNome, ultimoNome FROM Funcionarios";
            $resultadoFuncionarios = mysqli_query($ligacao, $sqlFuncionarios);

            if ($resultadoFuncionarios) {
                while ($linhaFuncionario = mysqli_fetch_assoc($resultadoFuncionarios)) {
                    echo "<option value='" . $linhaFuncionario['id'] . "'>" . $linhaFuncionario['primeiroNome'] . " " . $linhaFuncionario['ultimoNome'] . "</option>";

                }
                
            } else {
                echo "Erro ao buscar funcionários: " . mysqli_error($ligacao);
            }

            mysqli_close($ligacao);
            ?>
        </select>
        <input type="submit" value="Editar Funcionário">
    </form>
    <a class="button" href="index.html">Voltar ao Menu</a>
</body>
</html>
