<?php
$host = "localhost:3310";
$user = "root";
$pass = "";
$db = "barbalab";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
