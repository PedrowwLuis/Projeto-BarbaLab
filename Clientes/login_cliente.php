<?php
session_start();
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM cadastro_cliente WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $dados = $result->fetch_assoc();
        $_SESSION['cliente'] = $dados['nome'];
        $_SESSION['email'] = $dados['email'];

        header("Location: agendamento.php");
        exit;
    } else {
        echo "<script>alert('Email ou senha incorretos!'); window.location='login_cliente.php';</script>";
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
      <a href="registrocliente.html">Agendamento</a>
      <a href="../Admin/login_adm.php">Admin</a>
    </nav>
  </header>
  
  <div class="theme-toggle" id="themeToggle">
    <div class="slider"></div>
  </div>

 <div class="login-container">
  <div class="login-box">
      <h1>💈 Agendamento - BarbaLab</h1>
      <h2>Login Cliente Agendamento BarbaLab</h2>
      <form method="POST" action="login_cliente.php">
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Seu email" required>
        </div>
        <div class="input-group">
          <label for="password">Senha</label>
          <input type="password" name="senha" placeholder="Sua senha" required>
        </div>
        <button type="submit" class="btn">Login</button>
        <p class="error-message" id="error-message"></p>
      </form>
    </div>
  </div>

  <footer>
    <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
  </footer>

  <script src="../script.js"></script>
</body>
</html>