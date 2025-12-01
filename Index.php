<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BarbaLab - Home</title>
  <link rel="stylesheet" href="style.css">
  <style>
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
      color: #fff !important;
      text-shadow: 2px 2px 10px #000;
    }

    .hero p {
      margin-top: 10px;
      font-size: 20px;
      color: #fff !important;
      text-shadow: 2px 2px 8px #000;
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
      background: var(--card-bg);
      padding: 20px;
      border-radius: 10px;
      border: 1px solid var(--card-border);
      transition: 0.3s;
      box-shadow: 0 2px 8px var(--box-shadow);
    }

    .card:hover {
      transform: translateY(-5px);
      border-color: #e2b007;
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

  <div class="theme-toggle" id="themeToggle">
    <div class="slider"></div>
  </div>

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
        <h3 style="margin-top:50px;">Corte de Cabelo</h3>
        <p style="margin-top:50px;">Estilo moderno ou clássico, sempre com precisão científica.</p>

        <button class=btn onclick="window.location='Clientes/registrocliente.html'" style="margin-top:50px;">Faça já o seu Agendamento!</button>
      </div>
      <div class="card">
        <h3 style="margin-top:50px;">Barba Completa</h3>
        <p style="margin-top:50px;">Higienização, alinhamento e acabamento perfeito.</p>
        <button class=btn onclick="window.location='Clientes/registrocliente.html'" style="margin-top:50px;">Faça já o seu Agendamento!</button>
      </div>
      <div class="card">
        <h3 style="margin-top:50px;">Navalha Premium</h3>
        <p style="margin-top:50px;">Experiência tradicional com técnica aprimorada.</p>
        <button class=btn onclick="window.location='Clientes/registrocliente.html'" style="margin-top:50px;">Faça já o seu Agendamento!</button>
      </div>
    </div>
  </section>

  <section class="section" id="contato">
    <h2>Contato</h2>
    <p>Agende seu horário pelo WhatsApp:</p>
    <p style="margin-top: 10px; font-size: 22px; color: #e0b37a;">(83) 99365-2498</p>
  </section>

  <footer>
    <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
  </footer>

  <script src="script.js"></script>
  <script>
    function scrollToSection(id) {
      document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</body>
</html>