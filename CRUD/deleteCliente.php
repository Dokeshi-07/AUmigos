<?php
include "../infra/conexao.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["clienteId"] ?? null;
    if ($id) {
        $sql = "DELETE FROM Cliente WHERE clienteId = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
header("Location: ../index.php");
exit();