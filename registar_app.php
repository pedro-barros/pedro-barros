<?php
require "database.php";
$db = new DataBase();
    $nome= $_POST['nome'];
    $email= $_POST['email'] ;
    $password= $_POST['password'] ;
    
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password'])) {
    if ($db->connect()) {
        if ($db->signUp("confirmacao_user", $nome , $email,  $password)) {
            echo "Registado com sucesso";
        } else echo "O registo falhou";
    } else echo "Erro: Impossivel conectar à base de dados";
} else echo "Todos os campos são necessários!";
?>