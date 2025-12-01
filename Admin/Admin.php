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

<style>
/* --- FIX FOOTER NO FINAL --- */
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
}
main {
    flex: 1;
}

/* --- SUA TABELA --- */
.table-container {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
    margin-bottom: 50px;
}

.agenda-table {
    width: 90%;
    max-width: 900px;
    background: rgba(255,255,255,0.05);
    border-radius: 10px;
    overflow: hidden;
    backdrop-filter: blur(5px);
}

.agenda-table table {
    width: 100%;
    border-collapse: collapse;
}

.agenda-table th {
    background: #222;
    color: #fff;
    padding: 15px;
    font-size: 16px;
    text-align: center;
    border-bottom: 2px solid #444;
}

.agenda-table td {
    padding: 12px;
    text-align: center;
    color: white;
    border-bottom: 1px solid #333;
    font-size: 14px;
}

.agenda-table tr:hover {
    background: rgba(255,255,255,0.08);
    transition: 0.3s;
}

.btn-edit {
    background: #008cff;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 13px;
}
.btn-edit:hover {
    background: #0073d1;
}

.btn-del {
    background: red;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 13px;
}
.btn-del:hover {
    background: darkred;
}

.add-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #00c853;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}
.add-btn:hover {
    background: #009c3e;
}
</style>

</head>
<body>

<header>
  <h1>Gerenciar Agendamentos</h1>
  <nav>
    <a href="../index.php">Home</a>
    <a href="../logout_adm.php">Sair</a>
  </nav>
</header>

<main>

<div class="theme-toggle" id="themeToggle">
  <div class="slider"></div>
</div>

<div class="login-container">
  <h1>📅 Lista de Agendamentos</h1>

  <div class="table-container">
    <div class="agenda-table">

        <table>
            <tr>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th colspan="2">Ações</th>
            </tr>

            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['nome']; ?></td>
                        <td><?= $row['serviços']; ?></td>
                        <td><?= date("d/m/Y", strtotime($row['data'])); ?></td>
                        <td><?= substr($row['hora'], 0, 5); ?></td>

                        <td><a href="editar_agendamento.php?id=<?= $row['id']; ?>" class="btn-edit">Editar</a></td>
                        <td><a href="excluir_agendamento.php?id=<?= $row['id']; ?>" class="btn-del">Excluir</a></td>
                    </tr>
                <?php endwhile; ?>

            <?php else: ?>
                <tr>
                    <td colspan="6" style="padding:20px;">Nenhum agendamento encontrado.</td>
                </tr>
            <?php endif; ?>

        </table>

        <center>
            <a href="agendamento_admin.php" class="add-btn">Adicionar Agendamento</a>
        </center>

    </div>
  </div>

</div>

</main>

<footer>
  <p>© 2025 BarbaLab - Todos os direitos reservados.</p>
</footer>

<script src="../script.js"></script>

</body>
</html>
