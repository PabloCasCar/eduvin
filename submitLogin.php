<?php include('ligacao.php');?>
<?php
session_start();

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eduvin_shop";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processa o formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Evita SQL injection
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);

    // Verifica o usuário e a senha
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuário autenticado
        $_SESSION['username'] = $user;
        header("Location: bem_vindo.php"); // Redireciona para uma página de boas-vindas
    } else {
        // Usuário ou senha incorretos
        echo "Usuário ou senha incorretos.";
    }
}
?>