<?php
require "database.php";
$db = new DataBase();
$email=  $_POST['email'] ;
$password=  $_POST['pass'] ;
 if (isset($_POST['email']) && isset($_POST['pass'])) {
    if ($db->connect()) {
        if ($db->logIn("users", $email,  $password)) {
            echo "Login com sucesso";
        } else echo "Email ou Password incorretos";
    } else echo "Erro: Impossivel conectar à Database";
} else echo "Todos os campos são necessários!";
?>