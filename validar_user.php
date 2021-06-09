<?php
$id = $_GET["id"];
require "uploadconn.php";
$con = new Db();

$getinfo = "SELECT * FROM confirmacao_user WHERE id_registo='".$id."'";
$stmt = $con->connect()->prepare($getinfo);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$nome = $result["nome"];
$email = $result["email"];
$pass = $result["password"];

//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method

// Check connection

// sql to delete a record
 $query = "INSERT INTO users(`nome`, `email`,`tipo_utilizador`, `pass`)VALUES (?,?,?,?);";
 $tipo_utilizador='operador';
$stmtt = $con->connect()->prepare($query);
        $stmtt->bindParam(1,$nome);
        $stmtt->bindParam(2,$email);
        $stmtt->bindParam(3,$tipo_utilizador);
        $stmtt->bindParam(4,$pass);


if ($stmtt->execute()) {
    $stmtt->die;

    $apagar = "DELETE FROM confirmacao_user WHERE id_registo = $id";
    $select = $con->connect()->prepare($apagar);
    $select->setFetchMode(PDO::FETCH_ASSOC);
    if($select->execute()){
    header('Location: pagina_principal.php');
    $select->die;
    exit;
    }
} else {
    echo "Ocorreu um erro ao confirmar o utilizador!";
}
?>