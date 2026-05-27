<?php

include("conexao.php");

$limite = 10;

$pagina = 1;

if(isset($_GET['pagina'])) {
    $pagina = (int) $_GET['pagina'];
}

if($pagina < 1) {
    $pagina = 1;
}

$offset = ($pagina - 1) * $limite;

$ordenar = "nome";

if(isset($_GET['ordenar'])) {

    if($_GET['ordenar'] == "preco") {
        $ordenar = "preco";
    }
}

$sqlTotal = "SELECT COUNT(*) FROM produtos";

$stmtTotal = $pdo->prepare($sqlTotal);

$stmtTotal->execute();

$totalProdutos = $stmtTotal->fetchColumn();

$totalPaginas = ceil($totalProdutos / $limite);

$sql = "SELECT * FROM produtos
        ORDER BY $ordenar
        LIMIT :limite OFFSET :offset";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":limite", $limite, PDO::PARAM_INT);
$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

$stmt->execute();

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Paginação</title>
</head>

<body>

    <h2>Lista de Produtos</h2>

    <a href="?ordenar=nome">Ordenar por Nome</a>

    |

    <a href="?ordenar=preco">Ordenar por Preço</a>

    <br><br>

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

    <br>

    <a href="?pagina=1&ordenar=<?php echo $ordenar; ?>">
        Primeira
    </a>

    |

    <a href="?pagina=<?php echo max(1, $pagina - 1); ?>&ordenar=<?php echo $ordenar; ?>">
        Anterior
    </a>

    |

    <a href="?pagina=<?php echo min($totalPaginas, $pagina + 1); ?>&ordenar=<?php echo $ordenar; ?>">
        Próxima
    </a>

    |

    <a href="?pagina=<?php echo $totalPaginas; ?>&ordenar=<?php echo $ordenar; ?>">
        Última
    </a>

</body>

</html>