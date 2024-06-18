<?php 
include('ligacao.php');
include('cabecalho.php');
include('carrinho.php');

function finalizarCompra() {
    // Aqui você pode adicionar o código para processar a compra
    // Por exemplo, salvar a compra no banco de dados, enviar um email de confirmação, etc.
    unset($_SESSION['carrinho']); // Limpar o carrinho após a compra
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    finalizarCompra();
    header("Location: confirmacao_sucesso.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="confirmation-container">
        <h1>Confirmação de Compra</h1>
        <p>Obrigado por sua compra! Seu pedido foi processado com sucesso.</p>
        <p><a href="index.php">Voltar à página inicial</a></p>
    </div>
</body>
</html>
