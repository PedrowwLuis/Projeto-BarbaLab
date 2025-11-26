<?php
session_start();
include '../conexao.php';

// Bloqueia acesso se não estiver logado como admin
if (!isset($_SESSION['adm'])) {
    header("Location: login_adm.php");
    exit;
}

// Buscar todos os agendamentos
$sql = "SELECT * FROM agendamento ORDER BY data";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Gerenciar Agendamentos - BarbaLab</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../script.js">
</head>
<body>

<header>
  <h1>Gerenciar Agendamentos</h1>
  <nav>
    <a href="../index.php">Home</a>
    <a href="../logout_adm.php">Sair</a>
  </nav>
</header>

<div class="theme-toggle" id="themeToggle">
  <div class="slider"></div>
</div>

<div class="login-container">
  <h1>📅 Lista de Agendamentos</h1>

  <div class="login-box" style="width: 800px; text-align: left;">

    <table style="width:100%; border-collapse: collapse; color:white;">
      <tr style="border-bottom: 1px solid #555;">
        <th style="padding:10px;">Cliente</th>
        <th>Serviço</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Ações</th>
      </tr>

      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr style="border-bottom: 1px solid #333;">
            <td style="padding:10px;"><?= $row['nome']; ?></td>
            <td><?= $row['servicos']; ?></td>
            <td><?= date("d/m/Y", strtotime($row['data'])); ?></td>
            <td><?= substr($row['hora'],0,5); ?></td>

            <td>
              <a href="editar_agendamento.php?id=<?= $row['id']; ?>" class="btn" style="padding:5px 10px;">Editar</a>
              <a href="excluir_agendamento.php?id=<?= $row['id']; ?>" class="btn" style="padding:5px 10px; background:red; color:white;">Excluir</a>
            </td>
          </tr>
        <?php endwhile; ?>

      <?php else: ?>
        <tr>
          <td colspan="5" style="padding:20px; text-align:center;">Nenhum agendamento encontrado.</td>
        </tr>
      <?php endif; ?>

    </table>

    <br>
    <a href="agendamento_admin.php" class="btn">Adicionar Agendamento</a>

  </div>
</div>

<footer>
  <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
</footer>

<script src="../script.js"></script>

</body>
</html>
