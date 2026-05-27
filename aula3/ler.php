<?php

    include 'conexao.php';

    $sql = "SELECT * FROM alunos";
    $resultado = $conexao->query($sql);
    while($linha = $resultado->fetch_assoc()) {
        echo $linha['nome'] . ' ' . $linha['email'] . '<br>';
    }

    $conexao->close();
?>