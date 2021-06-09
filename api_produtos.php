<?php
include('conn_offline.php');
// include('conn_online.php');
// require('uploadconn.php');

// $conn=new Db();
// $querryartigos = mysqli_query($conn,"SELECT * FROM artigos");
// $produtos = array();
// while($row=mysqli_fetch_assoc($querryartigos)){
// $produtos[]=$row;
// }
// print(json_encode(array("produtos"=>$produtos)));

$email=/* $_POST["email"] */"teste@teste.com";


$querryartigos = mysqli_query($conn,"SELECT * FROM artigos");

$querryconcorrentes =mysqli_query($conn,"SELECT * FROM concorrentes");

$querryuserinfo=mysqli_query($conn,"SELECT user_area_loja.id_user_area_loja,user_area_loja.user_id,users.nome, users.email, lojas_agriloja.localizacao_loja, area.descricao_area FROM user_area_loja JOIN users ON user_area_loja.user_id=users.id JOIN lojas_agriloja ON user_area_loja.loja_id=lojas_agriloja.loja_id JOIN area ON user_area_loja.area_id=area.id_area WHERE email ='" .$email."'");


$database=array();

$produtos = array();
$lojas=array();
$concorrentes=array();
$area=array();
$shopping=array();
$area_user_id=array();
$user=array();

if(isset($_POST['email'])){
    while($row=mysqli_fetch_assoc($querryartigos)){
        $database['produtos'][]=$row;
    } 

    while($row=mysqli_fetch_assoc($querryuserinfo)){
        $database['info'][]=$row;
    } 
    
    while($row=mysqli_fetch_assoc($querryconcorrentes)){
        $database['concorrentes'][]=$row;
    } 
}

print(json_encode($database));
?>

