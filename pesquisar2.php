<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Resultados da Pesquisa</title>
</head>
<body>
    <h1>Resultados da Pesquisa</h1>
    
    <?php
    echo $_POST['id'];
    //echo "teste";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $palavra = $_POST["palavra"];
        $funcionario_id = $_POST["id"]; 
        $estado = $_POST["estado"];
        $dataInicio = $_POST["data"];
        $dataFim = $_POST["prazo"];
    
        $ligacao = mysqli_connect("localhost", "root", "", "tarefas");
    
        if ($ligacao->connect_error) {
            die(mysqli_error($ligacao));
        }
    
        $sql = "SELECT * FROM Tarefas WHERE 1 = 1";
    
        if (!empty($palavra)) {
            $sql .= " AND titulo LIKE '%$palavra%'";
        }
    
        if ($funcionario_id != 0) { 
            $sql .= " AND funcionario = $funcionario_id";
        }
    
        if ($estado != 0) {
            $sql .= " AND estado = $estado";
        }
    
        if (!empty($dataInicio)) {
            $sql .= " AND data >= '$dataInicio'";
        }
    
        if (!empty($dataFim)) {
            $sql .= " AND prazo <= '$dataFim'";
        }
    
        $resultado = mysqli_query($ligacao, $sql);
    
        if ($resultado) {
            echo "<h2>Resultados da Pesquisa:</h2>";
            while ($linhaTarefa = mysqli_fetch_assoc($resultado)) {
                echo "<div class="."tarefa-container".">";
                
                echo "<h4>Título: " . $linhaTarefa['titulo'] . "</h4>";
               
                echo "<p>Estado: " . $linhaTarefa['estado'] . "</p>";
                echo "<p>Data: " . $linhaTarefa['data'] . "</p>";
                echo "<p>Prazo: " . $linhaTarefa['prazo'] . "</p>";
                echo "</div>";
                echo "<hr>";
            }
        } else {
            echo "Erro na pesquisa: " . mysqli_error($ligacao);
        }
    
        mysqli_close($ligacao);
    }
    ?>

    <br><br>
    <a class="button" href="pesquisar1.php">Nova Pesquisa</a>
    <a class="button" href="index.html">Voltar ao Menu</a>
</body>
</html>
