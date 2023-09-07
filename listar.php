<html>
<head>
    <meta charset="utf-8">
    <title>Listar Todas as Tarefas</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <a class="button" href="index.html" target="_self">Voltar ao menu</a>
    <?php

        
        $ligacao = mysqli_connect("localhost", "root", "","tarefas");

        if ($ligacao->connect_error) {
            die(mysqli_error($ligacao)); 
        }

        $sql = "SELECT * FROM tarefas";

        $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
        
        $numreg = 0; 

        echo "<div class='mostraTarefas-container'>";
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<div class='tarefa-container'>";
            echo "<h4>Tarefa: " . $linha['titulo'] . "</h4>";
            $sqlFuncionario = "SELECT primeiroNome, ultimoNome FROM Funcionarios WHERE id = " . $linha['funcionario'];
            $resultadoFuncionario = mysqli_query($ligacao, $sqlFuncionario) or die(mysqli_error($ligacao));
            $linhaFuncionario = mysqli_fetch_assoc($resultadoFuncionario);
            echo "<h4>Funcionário: " . $linhaFuncionario['primeiroNome'] . " " . $linhaFuncionario['ultimoNome'] . "</h4>";
            echo "Descrição: " . $linha['descricao'] . "<br>";
            echo "Data atribuição: " . $linha['data'] . "<br>";
            echo "Data limite: " . $linha['prazo'] . "<br>";
            echo "Estado: " . $linha['estado'] . "<br>";
            echo "<hr>";
            echo "</div>";

            $numreg = $numreg + 1; 
        }
        echo "</div>";

        echo "N. de registos na base de dados: " . $numreg;

        mysqli_close($ligacao);
    ?>

    <br><br>
    <a class="button" href="index.html" target="_self">Voltar ao menu</a>
</body>
</html>
