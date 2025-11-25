<?php
session_start();
include '../conexao.php';

// ⚠️ Impede acesso sem login de admin
if (!isset($_SESSION['adm'])) {
    header("Location: login_adm.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM agendamento WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Agendamento excluído com sucesso!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir agendamento.'); window.location='admin.php';</script>";
    }
} else {
    header("Location: admin.php");
}
?>
