<?php include('cabecalho.php');?>
<?php include('ligacao.php');?>

<?php

// Configurações do banco de dados
$servername = "localhost";
$nomename = "root";
$password = "";
$dbname = "eduvin_shop";
$telefone = "";
$email = "";
$endereco = "";

// Cria a conexão
$conn = new mysqli($servername, $nomename, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processa o formulário de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    /*$pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];*/
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereço'];

    if ($pass !== $confirm_pass) {
        echo "As senhas não correspondem.";
    } else {
        // Evita SQL injection
        $nome = $conn->real_escape_string($nome);
        $pass = password_hash($conn->real_escape_string($pass), PASSWORD_BCRYPT);

        // Verifica se o usuário já existe
        $sql = "SELECT * FROM clientes WHERE nome='$nome'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Usuário já existe.";
        } else {
            // Insere o novo usuário no banco de dados
            $sql = "INSERT INTO clientes (nome, password) VALUES ('$nome', '$pass')";
            if ($conn->query($sql) === TRUE) {
                echo "Registro realizado com sucesso!";
                header("Location: login.php");
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="style.css">
</head>



<body>
    <div class="register-container">
    <div class="form">
      <div class="title">Olá</div>
      <div class="subtitle">Vamos criar a sua conta!</div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Primeiro nome</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Último nome</label>
      </div>
      <div class="input-container ic2">
        <input id="email" class="input" type="text" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</>
      </div>
      <div class="input-container ic2">
        <input id="password" class="input" type="text" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="password" class="placeholder">Password</>
      </div>
      <button type="text" class="submit">Registar</button>
    </div>
</body>
</html>