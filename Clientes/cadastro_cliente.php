<?php
include "../conexao.php";

// Requerimento do envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Recebimento dos parêmetros eniviados pelo metodo post do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificação de email duplicados
    $sqlCheck = "SELECT * FROM cadastro_cliente WHERE email = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("s", $email);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Este email já está cadastrado!'); window.location='registrocliente.html';</script>";
        exit;
    }

    // Insere no banco
    $sql = "INSERT INTO cadastro_cliente (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso! Faça login.'); window.location='login_cliente.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar!'); window.location='registrocliente.html';</script>";
    }
}
?>
