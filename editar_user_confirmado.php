<?php 
require "uploadconn.php";

    $user_id=$_GET['id'];
    $user_name=$_GET['nome'];
    if(isset($_GET['loja'])){
    $localizacao_loja=$_GET['loja'];
    $loja_id=$_GET['loja_id'];
    $areas_quantidade=$_GET['areas_quantidade'];
    $stringAreas="";
        for($i=0;$i<$areas_quantidade;$i++){
            if($stringAreas==""){
                $stringAreas=$_GET["area$i"];
            }else{
            $stringAreas=$stringAreas.", ".$_GET["area$i"];
            }
        }
        $array_areas=explode(', ' ,$stringAreas);
    }
    $con = new Db();

 if(isset($_POST['alterar'])){ $queryDelete="DELETE FROM user_area_loja WHERE user_id=$user_id";
        $stmtapagar=$con->connect()->prepare($queryDelete);
        if($stmtapagar->execute()){ $queryInserirAreasUser="INSERT INTO user_area_loja(`user_id`,`area_id`,`loja_id`) VALUES(?,?,?)";
            $statement = $con->connect()->prepare($queryInserirAreasUser);
            $arrayverificações=array();
            $checkbox=$_POST['areas'];
            $loja_id=$_POST['lojas'];
            // print_r($checkbox);
            foreach($_POST['areas'] as $opcaoCheck){  
                $statement->bindParam(1,$user_id);
                $statement->bindParam(2,$opcaoCheck);
                $statement->bindParam(3,$loja_id);
            if($statement->execute()){ array_push($arrayverificações,"true");//adicionar contagem de vezes que entrou aqui!
            }}if(in_array("true",$arrayverificações,true)){
                //verificava as posicoes do array conforme a contagem de vezes que entrou no if($statement->execute()) e verificava as posicoes dos array.
                   exit(header('Location: users_confirmados.php'));}}}                
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestao Utilizadores Confirmados</title>
    <?php include('head.php') ?>
</head>

<body style=" overflow-y: visible!important;">
    <?php include('navhamburguer.php') ?>



    <style>
    .container_central {
        align-self: center;
        padding-top: 30px;
        width: 65%;
        padding-right: 5px;
        padding-left: 5px;
        margin-right: auto;
        margin-left: 20%;
    }

    #div_tabela {
        width: 100%;
        border-radius: 6px;
        margin: 20px auto;
    }

    #tr_titulo {
        font-weight: bold;
        font-size: 1.5rem;
    }

    #h2_user {
        margin-bottom: 5%;
        text-align: center;
        color: white;
        font-size: 2rem;
        font-weight: bold;
    }
    </style>
    <div class="container_central" id="container_central">
        <h2 id="h2_user">Editar Utilizador <?php echo $user_name?></h2>
        <form id="form1" method="POST">
            <label id="tr_titulo" for="lojas">Escolha uma loja</label>
            <select name="lojas" id="lojas">
                <?php
                if($localizacao_loja==""||$localizacao_loja==" "||$localizacao_loja=="null"||$localizacao_loja=="NULL")
                {?>
                <option value="">Selecione a Loja</option>
                <?php }else{?>
                <option value="<?php echo $loja_id ?>"><?php echo $localizacao_loja ?></option>
                <?php 
                }
              $selectLojas='SELECT * FROM lojas_agriloja';
              $lista = $con->connect()->prepare($selectLojas);
              $lista->setFetchMode(PDO::FETCH_ASSOC);?>
                <!-- <input name="user_id" id="user_id" type="text" style='display:none'> -->
                <?php if($lista->execute()){
                  $array=array();
                  foreach($lista as $rowLojas){ ?>

                <option value="<?php echo $rowLojas['loja_id']?>"><?php echo $rowLojas['localizacao_loja']?></option>
                <?php }} ?>
            </select>


            <div id="div_tabela">

                <table>
                    <tr id="tr_titulo">
                        <td colspan="2">Selecionar Areas</td>
                    </tr>
                    <?php $selectAreas='SELECT * FROM area';
              $listaAreas = $con->connect()->prepare($selectAreas);
              $listaAreas->setFetchMode(PDO::FETCH_ASSOC);
              
              if($listaAreas->execute()){
                  $array=array();
                  $checkbox_id=0;
                  foreach($listaAreas as $rowArea){ ?>

                    <tr>
                        <td><label
                                for="checkbox <?php echo $checkbox_id; ?>"><?php echo $rowArea['descricao_area']; ?></label>
                        </td>
                        <td><input type="checkbox" name="areas[]" id="checkbox <?php echo $checkbox_id; ?>"
                                value="<?php echo $rowArea['id_area']; ?>"></td>
                        <?php $checkbox_id=$checkbox_id+1; ?>
                    </tr>
                    <?php }} ?>
                </table>
            </div>

            <input type="submit" name="alterar" class="btn btn-success" value="Alterar"></input>
        </form>
    </div>
               
</body>