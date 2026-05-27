<?php

include("conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM usuarios WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$usuario = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>

    <h1>Editar Usuário</h1>

    <form action="atualizar.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">

        <input type="text" name="nome" value="<?php echo $usuario["nome"]; ?>">

        <br><br>

        <input type="email" name="email" value="<?php echo $usuario["email"]; ?>">

        <br><br>

        <input type="number" name="idade" value="<?php echo $usuario["idade"]; ?>">

        <br><br>

        <button type="submit">Atualizar</button>

    </form>

</body>
</html>