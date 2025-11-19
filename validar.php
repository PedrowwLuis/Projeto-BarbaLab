<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Pega o valor enviado pelo botão
    $nome = trim($_POST['nome'] ?? '');

    // Validação simples
    if (empty($nome)) {
        echo "O nome é obrigatório!";
    } else {
        echo "Nome válido: " . htmlspecialchars($nome);
    }
}
?>
