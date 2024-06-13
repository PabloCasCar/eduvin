<?php 

include('ligacao.php');
include('cabecalho.php');

// Check if the 'id' key exists in the $_GET array
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID do produto não especificado.";
    exit();
}

$produtos_id = $_GET['id'];

// Ensure the database connection is set up
if (!isset($ligacao) || $ligacao->connect_error) {
    echo "Erro ao conectar ao banco de dados.";
    exit();
}

// Obtém os detalhes do produto do banco de dados
$sql = "SELECT * FROM produtos WHERE id='$produtos_id'";
$result = $ligacao->query($sql);

if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc(); // Store the fetched product details in $produto
} else {
    echo "Produto não encontrado.";
    exit();
}

$ligacao->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($produto['nome']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="produto-detalhes">
        <h1><?php echo htmlspecialchars($produto['nome']); ?></h1>
        <p>Preço: €<?php echo number_format($produto['preco'], 2); ?></p>
        <p>Quantidade em estoque: <?php echo $produto['quantidade_estoque']; ?></p>
        <form action="carrinho.php" method="POST">
            <input type="hidden" name="acao" value="add">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            <button type="submit">Adicionar ao Carrinho</button>
        </form>
    </div>
</body>
</html>
