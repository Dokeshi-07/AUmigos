<?php 

include("../infra/conexao.php");

$stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email) VALUES (?, ?, ?)");
$stmt->execute();

$clineteNome = $_POST['clienteNome'] ?? null;
$clienteCpf = $_POST['clienteCpf'] ?? null;
$clienteEmail = $_POST['clienteEmail'] ?? null;

$stmt->execute([$clineteNome, $clienteCpf, $clienteEmail]);

?>