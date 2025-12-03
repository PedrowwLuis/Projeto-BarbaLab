<?php
session_start();

// Remove todas as variáveis da sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redirecionamento para a página login do adm
header("Location: index.php");
exit;
?>
