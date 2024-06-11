<?php include('ligacao.php');?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sua_base_de_dados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém o ID do produto da URL
$produto_id = $_GET['id'];

// Obtém os detalhes do produto do banco de dados
$sql = "SELECT * FROM products WHERE id='$produto_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc();
} else {
    echo "Produto não encontrado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto['name']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php"><img id="logo" src="images/EDUVIN.png" alt="Eduvin's logo"></a>
        <ul id="menu">
            <li><a href="index.php#inicio">Inicio</a></li>
            <li><a href="index.php#roupas">Roupas</a></li>
            <li><a href="index.php#acessorios">Acessórios</a></li>
            <li><a href="index.php#sobrenos">Sobre nós</a></li>
            <li><a href="index.php#contactos">Contactos</a></li>
        </ul>
    </header>
    <main>
        <div class="product-container">
            <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
            <h1><?php echo $produto['nome']; ?></h1>
            <p><?php echo $produto['descrição']; ?></p>
            <p>Preço: €<?php echo $produto['preço']; ?></p>
            <button>Adicionar ao Carrinho</button>
        </div>
    </main>
</body>
</html>