<?php 

include("../infra/connection.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $clineteNome = $_POST['clienteNome'];
    $clienteCpf = $_POST['clienteCpf'];
    $clienteEmail = $_POST['clienteEmail'];

$stmt = $conn->prepare("INSERT INTO Cliente (clienteNome, clienteCPF, clienteEmail) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $clineteNome, $clienteCpf, $clienteEmail);
$stmt->execute();
if ($stmt->execute () === TRUE) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar cliente: " . $stmt->error;
}
$stmt->close();
header("Location: ../index.php");
exit();
} else {
    echo "Please fill in all required fields.";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form>
        <input type="text" name="clienteNome" placeholder="Name"><br>
        <input type="text" name="clienteCpf" placeholder="CPF"><br>
        <input type="email" name="clienteEmail" placeholder="Email"><br>
        <button type="submit">Create Client</button>
        <button><a href="../index.php">Voltar</a></button>
    </form>

</body>
</html>