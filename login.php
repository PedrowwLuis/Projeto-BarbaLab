<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BarbaLab - Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #111;
      color: #fff;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background: #000;
      border-bottom: 2px solid #444;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    header h1 {
      font-size: 28px;
      color: #e0b37a;
    }

    nav a {
      margin-left: 20px;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    nav a:hover {
      color: #e0b37a;
    }
    
    /* Estilos para o Login */
    .login-container {
      height: 90vh; /* Para centralizar verticalmente na tela */
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
      text-align: center;
    }

    .login-box {
      background: #1a1a1a;
      padding: 40px;
      border-radius: 10px;
      border: 1px solid #333;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .login-box h2 {
      margin-bottom: 30px;
      color: #e0b37a;
      font-size: 24px;
    }

    .input-group {
      margin-bottom: 15px;
      text-align: left;
    }

    .input-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    .input-group input[type="text"],
    .input-group input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #444;
      border-radius: 5px;
      background-color: #222;
      color: #fff;
      font-size: 16px;
    }

    .btn {
      width: 100%;
      padding: 12px 25px;
      margin-top: 15px;
      font-size: 18px;
      background: #e0b37a;
      border: none;
      cursor: pointer;
      border-radius: 6px;
      transition: 0.3s;
      font-weight: bold;
    }

    .btn:hover {
      background: #c79a60;
    }

    footer {
      text-align: center;
      padding: 20px;
      background: #000;
      border-top: 2px solid #444;
      /* Remove a margem superior para evitar sobreposição */
    }
  </style>
</head>
<body>
  <header>
    <h1>BarbaLab</h1>
    <nav>
      <a href="BarbalabHome.php">Home</a>
      <a href="#servicos">Serviços</a>
      <a href="#contato">Contato</a>
    </nav>
  </header>

  <section class="login-container">
    <div class="login-box">
      <h2>Acesso Administrativo</h2>
      
      <form action="validar_login.php" method="POST">
        <div class="input-group">
          <label for="username">Usuário</label>
          <input type="text" id="username" name="username" required>
        </div>
        
        <div class="input-group">
          <label for="password">Senha</label>
          <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit" class="btn">Entrar</button>
      </form>

    </div>
  </section>

  <footer>
    <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
  </footer>
</body>
</html>