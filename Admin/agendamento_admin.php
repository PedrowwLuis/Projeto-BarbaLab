<?php
session_start();

if (!isset($_SESSION['cliente'])) {
    header("Location: login_adm.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Agendar Horário</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>BarbaLab</h1>
  <nav>
    <a href="../index.php">Home</a>
    <a href="admin.php">Voltar</a>
  </nav>
</header>

<div class="theme-toggle" id="themeToggle">
  <div class="slider"></div>
</div>

<div class="login-container">
  <div class="login-box">
      <h1>💈 Agendamento - BarbaLab</h1>
      <h2>Escolha seu horário</h2>

    <form method="POST" action="../agendar.php">

  <div class="input-group">
  <label>Serviços principais</label>
  <select name="servicoPrincipal" required>
      <option value="">Selecione...</option>
      <option value="Cabelo">Cabelo</option>
      <option value="Barba">Barba</option>
      <option value="Cabelo e Barba">Cabelo e Barba</option>
  </select>
</div>

<div class="input-group">
  <label>Serviços adicionais</label>

  <div class="checkbox-group">
      <label><input type="checkbox" name="extras[]" value="Sobrancelha"> Sobrancelha</label>
      <label><input type="checkbox" name="extras[]" value="Pigmentação"> Pigmentação</label>
      <label><input type="checkbox" name="extras[]" value="Hidratação"> Hidratação</label>
  </div>
</div>



  <div class="input-group">
    <label>Data</label>
    <input type="date" name="data" min="<?= date('Y-m-d'); ?>" required>
  </div>

  <div class="input-group">
    <label>Hora</label>
    <input type="time" name="hora" required>
  </div>

  <button type="submit" class="btn">Agendar</button>

</form>

  </div>
</div>

<footer>
  <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
</footer>

<script src="../script.js"></script>
</body>
</html>
