<?php
    require_once 'connection.php';

    $nome = $_POST["nome"];
    $um = $_POST["unidade"];

    $stmt = $connection->prepare("INSERT INTO produtos (nome, um) VALUES (:nome, :um)");

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':um', $um);

    $stmt->execute();

    header('Location: index.php');
    exit();