<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BarbaLab - Home</title>
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

    .hero {
      height: 90vh;
      background: url('barber.jpg') no-repeat center/cover;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px;
    }

    .hero h2 {
      font-size: 48px;
      text-shadow: 2px 2px 10px #000;
    }

    .hero p {
      margin-top: 10px;
      font-size: 20px;
      text-shadow: 2px 2px 8px #000;
    }

    .btn {
      margin-top: 20px;
      padding: 12px 25px;
      font-size: 18px;
      background: #e0b37a;
      border: none;
      cursor: pointer;
      border-radius: 6px;
      transition: 0.3s;
    }

    .btn:hover {
      background: #c79a60;
    }

    .section {
      padding: 50px 20px;
      text-align: center;
    }

    .servicos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 30px;
    }

    .card {
      background: #1a1a1a;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #333;
      transition: 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      border-color: #e0b37a;
    }

    footer {
      text-align: center;
      padding: 20px;
      background: #000;
      border-top: 2px solid #444;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <header>
    <h1>BarbaLab</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="#servicos">Serviços</a>
      <a href="Clientes\registrocliente.html">Agendamento</a>
      <a href="Admin\login_adm.php">Admin</a>
    </nav>
  </header>

  <section class="hero" id="home">
    <div>
      <h2>Onde Estilo e Ciência se Encontram</h2>
      <p>A barbearia que combina técnica, precisão e personalidade.</p>
      <button class="btn" onclick="scrollToSection('servicos')">Conheça nossos serviços</button>
    </div>
  </section>

  <section class="section" id="servicos">
    <h2>Nossos Serviços</h2>
    <div class="servicos">
      <div class="card">
        <h3>Corte de Cabelo</h3>
        <p>Estilo moderno ou clássico, sempre com precisão científica.</p>
      </div>
      <div class="card">
        <h3>Barba Completa</h3>
        <p>Higienização, alinhamento e acabamento perfeito.</p>
      </div>
      <div class="card">
        <h3>Navalha Premium</h3>
        <p>Experiência tradicional com técnica aprimorada.</p>
      </div>
    </div>
  </section>

  <section class="section" id="contato">
    <h2>Contato</h2>
    <p>Agende seu horário pelo WhatsApp:</p>
    <p style="margin-top: 10px; font-size: 22px; color: #e0b37a;">(99) 99999-9999</p>
  </section>

  <footer>
    <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
  </footer>

  <script>
    function scrollToSection(id) {
      document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</body>
</html>