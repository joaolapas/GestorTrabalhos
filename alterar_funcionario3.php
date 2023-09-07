<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario_id = $_POST["funcionario_id"];

    $novoPrimeiroNome = $_POST["primeiroNome"];
    $novoUltimoNome = $_POST["ultimoNome"];
    $novaFuncao = $_POST['funcao'];
    $novaDataNascimento = $_POST['dataNascimento'];
    $novoEmail = $_POST['email'];

    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao)); 
    }

    
    $sqlAtualizarFuncionario = "UPDATE Funcionarios SET primeiroNome = '$novoPrimeiroNome', ultimoNome = '$novoUltimoNome', funcao = '$novaFuncao', dataNascimento = '$novaDataNascimento', email = '$novoEmail' WHERE id = $funcionario_id";

    if (mysqli_query($ligacao, $sqlAtualizarFuncionario)) {
       
        sleep(3);
        header("Location: index.html");
        exit;
    } else {
        echo "Erro ao atualizar o funcionário: " . mysqli_error($ligacao);
    }

    // Fecha a DB
    mysqli_close($ligacao);
} 
?>
