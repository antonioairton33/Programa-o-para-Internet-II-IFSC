<?php

include("conexao.php");

$sql = "SELECT * FROM usuarios";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Usuários</title>
</head>
<body>

    <h1>Usuários Cadastrados</h1>

    <a href="cadastrar.php">Novo Usuário</a>

    <br><br>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>

        <?php while($usuario = $resultado->fetch_assoc()){ ?>

            <tr>

                <td><?php echo $usuario["id"]; ?></td>

                <td><?php echo $usuario["nome"]; ?></td>

                <td><?php echo $usuario["email"]; ?></td>

                <td><?php echo $usuario["idade"]; ?></td>

                <td>

                    <a href="editar.php?id=<?php echo $usuario["id"]; ?>">Editar</a>

                    <a href="excluir.php?id=<?php echo $usuario["id"]; ?>">Excluir</a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>
</html>