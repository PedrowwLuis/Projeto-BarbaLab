<?php
session_start();
include 'conexao.php';

// Impedir acesso sem login
if (!isset($_SESSION['cliente'])) {
    header("Location: login_cliente.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // PEGA O NOME E EMAIL DA SESSÃO
    $nome = $_SESSION['cliente'];
    $email = $_SESSION['email'];

    // Serviço principal
$servicoPrincipal = $_POST["servicoPrincipal"];

// Serviços adicionais (checkbox)
$extras = isset($_POST["extras"]) ? $_POST["extras"] : [];

// Junta tudo em um campo só
$servico = $servicoPrincipal;

if (!empty($extras)) {
    $servico .= " + " . implode(" + ", $extras);
}

    $data = $_POST["data"];
    $hora = $_POST["hora"];

    // Junta data + hora
    $datetime = $data . " " . $hora . ":00";

    // =============================
    // 1️⃣ Verificar se cliente já marcou 1 vez por semana
    // =============================
    $sqlSemana = "
        SELECT * FROM agendamento 
        WHERE email = ? 
        AND YEARWEEK(data, 1) = YEARWEEK(?, 1)
    ";

    $stmt = $conn->prepare($sqlSemana);
    $stmt->bind_param("ss", $email, $data);
    $stmt->execute();
    $resSemana = $stmt->get_result();

    if ($resSemana->num_rows > 0) {
        echo "<script>alert('Você já tem um horário marcado essa semana.'); 
        window.location='form_agendamento.php';</script>";
        exit;
    }

    // =============================
    // 2️⃣ Verificar horários ocupados (1h de margem)
    // =============================
    $sqlOcupado = "
        SELECT * FROM agendamento 
        WHERE data = ? 
        AND (
            TIME(?) BETWEEN SUBTIME(hora, '01:00:00') AND ADDTIME(hora, '00:59:59')
        )
    ";

    $stmt = $conn->prepare($sqlOcupado);
    $stmt->bind_param("ss", $data, $hora);
    $stmt->execute();
    $resOcupado = $stmt->get_result();

    if ($resOcupado->num_rows > 0) {
        echo "<script>alert('Este horário já está ocupado. Escolha outro!'); 
        window.location='form_agendamento.php';</script>";
        exit;
    }

    // =============================
    // 3️⃣ INSERIR NO BANCO – COM NOME E EMAIL DO LOGIN
    // =============================
    $sqlInsert = "INSERT INTO agendamento (nome, email, serviços, data, hora) 
                  VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("sssss", $nome, $email, $servico, $data, $hora);

    if ($stmt->execute()) {
        echo "<script>alert('Horário agendado com sucesso!'); 
        window.location='Clientes/agendamento.php';</script>";
    } else {
        echo "<script>alert('Erro ao agendar!'); 
        window.location='form_agendamento.php';</script>";
    }
}
?>
