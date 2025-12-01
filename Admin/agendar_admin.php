<?php
session_start();
include '../conexao.php';

// Impedir acesso sem login
if (!isset($_SESSION['adm'])) {
    header("Location: login_adm.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // PEGA O NOME E EMAIL DA SESSÃO
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Serviço principal
$servicoPrincipal = $_POST["servicoPrincipal"];

// Serviços adicionais (checkbox)
$extras = isset($_POST["extras"]) ? $_POST["extras"] : [];

// Junta tudo em um campo só
$servicos = $servicoPrincipal;

if (!empty($extras)) {
    $servicos .= " + " . implode(" + ", $extras);
}

    $data = $_POST["data"];
    $hora = $_POST["hora"];

    // Junta data + hora
    $datetime = $data . " " . $hora . ":00";

    // =============================
    // Inserir No Banco
    // =============================
    $sqlInsert = "INSERT INTO agendamento (nome, email, `serviços`, data, hora) 
                  VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("sssss", $nome, $email, $servicos, $data, $hora);

    if ($stmt->execute()) {
        echo "<script>alert('Horário agendado com sucesso!'); 
        window.location='agendamento_admin.php';</script>";
    } else {
        echo "<script>alert('Erro ao agendar!'); 
        window.location='agendamento_admin.php';</script>";
    }
}
?>
