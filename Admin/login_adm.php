<?php
session_start();
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM login_adm WHERE nome = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['adm'] = $nome;
        header("Location: admin.php");
        exit;
    } else {
        echo "<script>alert('Login de administrador inválido!'); window.location='login_adm.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BarbaLab</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
    <h1>BarbaLab</h1>
    <nav>
      <a href="../index.php">Home</a>
      <a href="../index.php#servicos">Serviços</a>
      <a href="../Clientes/registrocliente.html">Agendamento</a>
      <a href="login_adm.php">Admin</a>
    </nav>
  </header>
  <div class="theme-toggle" id="themeToggle">
    <span class="moon"></span>
    <div class="slider">
      <span class="icon"></span>
    </div>
  </div>

  <div class="login-container">
  <div class="login-box">
      <h1>💈 Agendamento - BarbaLab</h1>
      <h2>Entrar</h2>
      <form method="POST" action="login_adm.php" >
        <div class="input-group">
          <label for="username">Usuário</label>
          <input type="text" name="nome" placeholder="Nome do administrador" required>
        </div>
        <div class="input-group">
          <label for="password">Senha</label>
          <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <button type="submit" class="btn">Login</button>
        <p class="error-message" id="error-message"></p>
      </form>
    </div>
  </div>

  <footer>
    <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
