<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eduvin_shop";

    if(!isset($_SESSION)) {
        session_start();
    }

    $ligacao = mysqli_connect('localhost', 'root', '', 'eduvin_shop');
?>