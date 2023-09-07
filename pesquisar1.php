<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Pesquisar Tarefas</title>
</head>
<body>
    <h1>Pesquisar Tarefas</h1>
    <form method="post" action="pesquisar2.php">
        <label for="palavra">Pesquisar por Palavra:</label>
        <input type="text" name="palavra" id="palavra" placeholder="Digite uma palavra">
        
        <label for="funcionario">Pesquisar por Funcionário:</label>
        <select name="id" id="id">
            <option value="0">Todos</option>
            <?php
            $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

            if ($ligacao->connect_error) {
                die(mysqli_error($ligacao)); 
            }

            $sqlFuncionarios = "SELECT id, primeiroNome, ultimoNome FROM Funcionarios";
            $resultadoFuncionarios = mysqli_query($ligacao, $sqlFuncionarios);

            if ($resultadoFuncionarios) {
                while ($linhaFuncionario = mysqli_fetch_assoc($resultadoFuncionarios)) {
                    if (isset($_POST['id']) && $_POST['id'] == $linhaFuncionario['id']) {
                        $selected = 'selected'; 
                    }
                    echo "<option value='" . $linhaFuncionario['id'] . "' $selected>" . $linhaFuncionario['primeiroNome'] . " " . $linhaFuncionario['ultimoNome'] . "</option>";
                }
            } else {
                echo "Erro ao buscar funcionários: " . mysqli_error($ligacao);
            }

            mysqli_close($ligacao);
            ?>
        </select>

        <label for="estado">Pesquisar por Estado:</label>
        <select name="estado" id="estado">
            <option value="0">Todos</option>
            <option value="1">Pendente</option>
            <option value="2">Em Progresso</option>
            <option value="3">Concluída</option>
        </select>

        <label for="data">Data de atribuição:</label>
        <input type="date" name="data" id="data">

        <label for="prazo">Data limite:</label>
        <input type="date" name="prazo" id="prazo">

        <input type="submit" value="Pesquisar">
    </form>
    <a class="button" href="index.html">Voltar ao Menu</a>
</body>
</html>
