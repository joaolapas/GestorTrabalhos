<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados
    $ligacao = mysqli_connect("localhost", "root", "", "tarefas");

    // Verifica se houve erro na conexão
    if ($ligacao->connect_error) {
        die(mysqli_error($ligacao)); // Encerra a execução do script e exibe o erro
    }

    // Obtém os dados do formulário
    $primeiroNome = $_POST['primeiroNome'];
    $ultimoNome = $_POST['ultimoNome'];
    $funcao = $_POST['funcao'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Funcionarios (primeiroNome, ultimoNome, funcao, dataNascimento, email) VALUES ('$primeiroNome', '$ultimoNome', '$funcao', '$dataNascimento', '$email')";

    if (mysqli_query($ligacao, $sql)) {
        header("Location: index.html");
        exit(); 
    } else {
        echo "Erro ao inserir funcionário: " . mysqli_error($ligacao);
    }

    mysqli_close($ligacao);
}
?>
