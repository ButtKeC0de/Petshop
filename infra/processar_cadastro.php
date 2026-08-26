<?php

include 'db/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome     = $_POST['nome'];
    $email    = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nome_au  = $_POST['nome_au'];
    $tipo     = $_POST['tipo'];
    $raca     = $_POST['raca'];
    $idade    = (int)$_POST['idade'];

    $stmt = $conn->prepare("INSERT INTO clientes (nome, email, telefone, nome_au, tipo, raca, idade) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $nome, $email, $telefone, $nome_au, $tipo, $raca, $idade);


    if ($stmt->execute()) {

        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>