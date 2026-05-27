<?php

include("conexao.php");

if(isset($_POST["nome"])){

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];

    $sql = "INSERT INTO usuarios(nome, email, idade) VALUES (?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("ssi", $nome, $email, $idade);

    $stmt->execute();

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>

    <h1>Cadastrar Usuário</h1>

    <form method="POST">

        <input type="text" name="nome" placeholder="Nome">

        <br><br>

        <input type="email" name="email" placeholder="Email">

        <br><br>

        <input type="number" name="idade" placeholder="Idade">

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

</body>
</html>