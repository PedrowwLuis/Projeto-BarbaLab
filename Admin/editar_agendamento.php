<?php
session_start();
include '../conexao.php';

// ⚠️ Apenas admins logados podem editar
if (!isset($_SESSION['adm'])) {
    header("Location: login_adm.php");
    exit;
}

// Buscar agendamento
if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM agendamento WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>alert('Agendamento não encontrado!'); window.location='admin.php';</script>";
    exit;
}

$ag = $result->fetch_assoc();

// Se enviar o formulário, atualizar
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $servicos = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    $update = "UPDATE agendamento SET servicos=?, data=?, hora=? WHERE id=?";
    $stmt2 = $conn->prepare($update);
    $stmt2->bind_param("sssi", $servicos, $data, $hora, $id);

    if ($stmt2->execute()) {
        echo "<script>alert('Agendamento atualizado com sucesso!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar agendamento');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Agendamento</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
    <h1>Editar Agendamento</h1>
    <nav>
        <a href="admin.php">Voltar</a>
    </nav>
</header>

<div class="theme-toggle" id="themeToggle">
  <div class="slider"></div>
</div>

<div class="login-container">
    <div class="login-box" style="width:420px; text-align:left;">
        <h2>Editar</h2>

        <form method="POST">

            <div class="input-group">
                <label>Serviço</label>
                <input type="text" name="servico" value="<?= $ag['servicos']; ?>" required>
            </div>

            <div class="input-group">
                <label>Data</label>
                <input type="date" name="data" value="<?= $ag['data']; ?>" required>
            </div>

            <div class="input-group">
                <label>Hora</label>
                <input type="time" name="hora" value="<?= $ag['hora']; ?>" required>
            </div>

            <button type="submit" class="btn">Salvar Alterações</button>

        </form>
    </div>
</div>

<footer>
    <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
</footer>

<script src="../script.js"></script>

</body>
</html>
