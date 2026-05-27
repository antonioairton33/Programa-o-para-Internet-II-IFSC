<?php

include("conexao.php");

$busca = "";

if(isset($_GET['busca'])) {
    $busca = $_GET['busca'];
}

$sql = "SELECT * FROM produtos WHERE nome LIKE :busca";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":busca", "%$busca%");

$stmt->execute();

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Busca Segura</title>
</head>

<body>

    <h2>Busca de Produtos (Segura)</h2>

    <form method="GET">

        <input type="text" name="busca">

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

        <?php while($produto = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
            <td><?php echo $produto['id']; ?></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['categoria']; ?></td>
            <td><?php echo $produto['preco']; ?></td>
        </tr>

        <?php } ?>

    </table>

</body>

</html>