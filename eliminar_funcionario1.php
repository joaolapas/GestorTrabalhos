<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Eliminar Funcionário</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <a href="index.html" target="_self">Voltar ao menu</a>

    <h2>Eliminar Funcionário</h2>

    <form method="post" action="eliminar_funcionario.php">
        <label for="funcionario_id">Selecione o Funcionário a Eliminar:</label>
        <select name="funcionario_id" id="funcionario_id" required>
            <option value="">Selecione um Funcionário</option>
            <?php
                $ligacao = mysqli_connect("localhost", "root", "","tarefas");

                if ($ligacao->connect_error) {
                    die(mysqli_error($ligacao)); 
                }

                $sqlFuncionarios = "SELECT id, primeiroNome, ultimoNome FROM Funcionarios";
                $resultadoFuncionarios = mysqli_query($ligacao, $sqlFuncionarios) or die(mysqli_error($ligacao));

                while ($linhaFuncionario = mysqli_fetch_assoc($resultadoFuncionarios)) {
                    echo "<option value='" . $linhaFuncionario['id'] . "'>" . $linhaFuncionario['primeiroNome'] . " " . $linhaFuncionario['ultimoNome'] . "</option>";
                }

                mysqli_close($ligacao);
            ?>
        </select>
        <input type="submit" value="Eliminar Funcionário">
    </form>
    <a class="button" href="index.html">Voltar ao Menu</a>
</body>
</html>
