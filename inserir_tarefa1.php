<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inserir Tarefa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <a href="index.html" target="_self">Voltar ao menu</a>

    <h1>Inserir Tarefa</h1>

    <form method="post" action="inserir_tarefa.php">
        <label for="titulo">Título da Tarefa:</label>
        <input type="text" name="titulo" id="titulo" required>
        <br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="4" required></textarea>
        <br>

        <label for="funcionario">Funcionário:</label>
        <select name="funcionario" id="funcionario" required>
            <?php
                $ligacao = mysqli_connect("localhost", "root", "", "tarefas");
                $sqlFuncionarios = "SELECT id, primeiroNome, ultimoNome FROM Funcionarios";
                $resultadoFuncionarios = mysqli_query($ligacao, $sqlFuncionarios) or die(mysqli_error($ligacao));

                while ($linhaFuncionario = mysqli_fetch_assoc($resultadoFuncionarios)) {
                    echo "<option value='" . $linhaFuncionario['id'] . "'>" . $linhaFuncionario['primeiroNome'] . " " . $linhaFuncionario['ultimoNome'] . "</option>";
                }

                mysqli_close($ligacao);
            ?>
        </select>
        <br>

        <label for="data">Data de Atribuição:</label>
        <input type="date" name="data" id="data" required>
        <br>

        <label for="prazo">Data Limite:</label>
        <input type="date" name="prazo" id="prazo" required>
        <br>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="Pendente">Pendente</option>
            <option value="Em Progresso">Em Progresso</option>
            <option value="Concluída">Concluída</option>
        </select>
        <br>

        <input type="submit" value="Inserir Tarefa">
    </form>
    <a class="button" href="index.html">Voltar ao Menu</a>
</body>
</html>
