<?php


include("../infra/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $petNome = $_POST['petNome'];
    $petRaca = $_POST['petRaca'];
    $petIdade = $_POST['petIdade'];
    $clienteId = $_POST['clinteId'];

    $stmt = $conexao->prepare("INSERT INTO Pet (nome, raca, idade) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $petNome, $petRaca, $petIdade);
    if ($stmt->execute() === TRUE) {
        echo "Pet cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar pet: " . $stmt->error;
    }
    $stmt->close();
    header("Location: ../index.php");
    exit();
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST">

        <input type="text" name="petNome"><br>
        <input type="text" name="petRaca"><br>
        <input type="number" name="petIdade"><br>
        <label for="clinteId">Cliente:</label>
        <select name="clinteId" id="clinteId">
            <option value="0">Selecione um clinte</option>
            <?php
            $clientes = $conn->query("SELECT * FROM Cliente");
            while ($cliente = $clientes->fetch_assoc()) {
                ?>
                <option value="<?php echo $cliente['clienteId']; ?>"><?php echo $cliente['clienteNome']; ?></option>
                <?php
            } ?>
        </select>
        <button type="submit">Create Pet</button>
        <button><a href="../index.php">Voltar</a></button>

    </form>

</body>

</html>