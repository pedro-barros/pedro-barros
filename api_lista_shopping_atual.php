<?php
require('uploadconn.php');
$db=new Db();

$database=array();
$lista = array();

$querrylista = "SELECT * FROM lista_shopping_atual";
$querryartigos = mysqli_query($conn,"SELECT * FROM lista_shopping_atual");
 $stmt = $db->connect()->prepare($querrylista);
if($stmt->execute()){
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt as $row){
        $database['lista_shopping'][]=$row;
    }

} 
print(json_encode($database));
?>