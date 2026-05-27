<?php

include("conexao.php");

$busca = "";

if(isset($_GET["busca"])){
    $busca = $_GET["busca"];
}

$sql = "SELECT * FROM produtos WHERE nome LIKE '%$busca%'";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Busca Vulnerável</title>
</head>
<body>

    <h1>Busca de Produtos</h1>

    <form method="GET">

        <input type="text" name="busca" placeholder="Digite o nome do produto">

        <button type="submit">Buscar</button>

    </form>

    <br>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
        </tr>

        <?php while($produto = $resultado->fetch_assoc()){ ?>

            <tr>

                <td><?php echo $produto["id"]; ?></td>

                <td><?php echo $produto["nome"]; ?></td>

                <td><?php echo $produto["categoria"]; ?></td>

                <td>R$ <?php echo $produto["preco"]; ?></td>

            </tr>

        <?php } ?>

    </table>

</body>
</html>