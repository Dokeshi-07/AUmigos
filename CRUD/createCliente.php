<?php 

include("../infra/conexao.php");


if (isset($_POST['clienteNome']) && isset($_POST['clienteCpf']) && isset($_POST['clienteEmail'])) {
    $clineteNome = $_POST['clienteNome'];
    $clienteCpf = $_POST['clienteCpf'];
    $clienteEmail = $_POST['clienteEmail'];

$stmt = $conn->prepare("INSERT INTO Cliente (clienteNome, clienteCPF, clienteEmail) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $clineteNome, $clienteCpf, $clienteEmail);
$stmt->execute();
$stmt->close();
header("Location: ../index.php");
exit();
} else {
    echo "Please fill in all required fields.";
}
?>