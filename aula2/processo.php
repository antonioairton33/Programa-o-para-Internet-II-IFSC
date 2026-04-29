<?php
    $nome = $_POST["nome"] ?? "Anônimo";
    $assunto = $_POST["assunto"];

    echo "<p>Nome: $nome</p>";
    echo "<p>Assunto: $assunto</p>";
?>