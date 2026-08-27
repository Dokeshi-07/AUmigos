<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "AUpetsDB";
$port = 6608;
$conexao = new mysqli($host, $usuario, $senha, $banco, $port);
if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
};
$conexao->set_charset("utf8mb4");
?>