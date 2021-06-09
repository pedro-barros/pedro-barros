<?php
$id = $_GET['id'];
require "uploadconn.php";
$con = new Db();
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method

// Check connection

// sql to delete a record
$query = "DELETE FROM confirmacao_user WHERE id_registo = $id";

      $select = $con->connect()->prepare($query);
      $select->setFetchMode(PDO::FETCH_ASSOC);
      $select->execute();


if ($select->execute()) {
    $select->die;
    header('Location: gestao_utilizadores.php');
    exit;
} else {
    echo "Ocorreu um erro ao eliminar o utilizador!";
}
?>