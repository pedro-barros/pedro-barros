<?php
include('conn_offline.php');
    // include('conn_online.php');

    $email= /* $_POST["email"] */ "teste@teste.com";

    $sql="SELECT users.email, user_area_loja.id_user_area_loja, user_area_loja.user_id, users.nome,user_area_loja.area_id, user_area_loja.loja_id, lojas_agriloja.localizacao_loja, area.descricao_area FROM user_area_loja JOIN users ON user_area_loja.user_id=users.id JOIN lojas_agriloja ON user_area_loja.loja_id=lojas_agriloja.loja_id JOIN area ON user_area_loja.area_id=area.id_area /* WHERE email ='" .$email."' */";
    
    $resulset=mysqli_query($conn,$sql);
    $infos=array();

    // if(isset($_POST['email'])){
        while($row=mysqli_fetch_assoc($resulset)){
            $infos[]=$row;
        } 
    // }
    print(json_encode(array("infos"=>$infos)));
?>