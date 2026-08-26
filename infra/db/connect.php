<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "Petshop_Buttke"; 

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
