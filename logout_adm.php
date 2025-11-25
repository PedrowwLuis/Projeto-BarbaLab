<?php
session_start();

// Remove todas as variáveis da sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página inicial (ou login)
header("Location: Admin/login_adm.php");
exit;
?>
