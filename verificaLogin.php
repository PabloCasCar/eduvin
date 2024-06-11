<?php
    include('ligacao.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = filter_input(INPUT_POST, 'nome');
        $pass = filter_input(INPUT_POST, 'senha');
    }

    if (empty($login) || empty($pass)) {
        header('Location: login.php?erro-preenchimento');
    } else {
        // Encriptação da palavra-passe com método sha1()
        $pass = sha1($pass);
        $consulta = "SELECT CodUtilizador FROM utilizadores ";
        $consulta .= "WHERE nome like '$login' AND senha='$pass'";
        try {
            $resultado = $ligacao->query($consulta);
            if ($resultado->num_rows > 0) {
                header('Location: index.php?log=sucesso');
            } else {
                header('Location: login.php?log=erro');
            }
        } catch (Exception $e) {
            echo 'Falha na consulta: ' . $ligacao->error;
        }
    }

    try {
        $resultado = $ligacao->query($consulta);
        if ($resultado->num_rows > 0) {
            // Ler um registo do resultado
            $utilizador = $resultado->fetch_assoc();
            // Extrair o código do utilizador autenticado
            $cod = $utilizador['CodUtilizador'];
            // registar na sessão esse código
            $_SESSION['Codutil'] = $cod;
            // registar na sessão o username/login
            $_SESSION['Username'] = $login;
            header('Location: index.php?log=sucesso');
        } else {
            header('Location: login.php?log=erro');
        }
    } catch(Exception $e) {

    echo ' Falha na consulta: '. $this->_ligacao->error;

}


?>