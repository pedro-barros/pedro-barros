<?php
require 'uploadconn.php';
$con = new Db();

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
    .container_gestao {
        font-size: 1.2em;
        width: 65%;
        padding-right: 5px;
        padding-left: 5px;
        margin-right: auto;
        margin-left: 20%;
    }

    .table .thead-dark th {
        width: 20%;
        text-align: center;
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }

    .table .thead-dark tr {
        width: 20%;
        text-align: center;
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }

    .cabecalho_table_gestao {
        width: 100%;
        text-align: center;
        color: black;
        font-weight: bold;
        
    }

    #tabela_gestao {
        width: 100%;
        align-content: center;
    }

    .especial {
        text-align: center !important;
        width: 40%;
    }

    .especial_eliminar {
        text-align: right !important;
        width: 20% !important;
    }

    .especial_confirmar {
        text-align: left !important;
        width: 20% !important;
    }

    #td_areas {
        text-align: left;
    }

    </style>

    <?php
$query = "SELECT * FROM confirmacao_user";
?>


    <div class="container_gestao" id="container_gestao">
        <h2>Gestao de Novos Utilizadores</h2>
        <br>

        <table class="table table-striped table-hover table-sm table-responsive" id="tabela_gestao">
            <thead class="thead-dark">
                <tr class="cabecalho_table_gestao">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Loja</th>
                    <th>Areas</th>
                </tr>
            </thead>
            <tbody>
                <?php
      $query = 'SELECT lojas_agriloja.loja_id ,users.id,users.nome,users.email,lojas_agriloja.localizacao_loja,GROUP_CONCAT(" ",area.descricao_area)AS areas 
      FROM users 
LEFT JOIN user_area_loja ON user_area_loja.user_id=users.id
LEFT JOIN area ON user_area_loja.area_id=area.id_area
LEFT JOIN lojas_agriloja ON user_area_loja.loja_id=lojas_agriloja.loja_id 
GROUP BY users.email';

      $select = $con->connect()->prepare($query);
      $select->setFetchMode(PDO::FETCH_ASSOC);
      $select->execute();

      foreach ($select as $row) {
      ?>
                <tr class="cabecalho_table_gestao">
                    <td style="display:none;"> <?php echo $row['id']; ?></td>
                    <td> <?php echo $row['nome']; ?></td>

                    <!-- <script>
                    $('#myModal').on('show.bs.modal', function(e) {
                        //get data-id attribute of the clicked element
                        var userId = $(e.relatedTarget).data('id');
                        //populate the textbox
                        $(e.currentTarget).find('input[name="user_id"]').val(userId);
                    });
                    </script> -->
                    <!-- acho que faltavam echo antes do $row <td><a data-target="#myModal" data-toggle="modal" href="users_confirmados.php?id=<?php $row['id'] ?>" data-id="'<?php $row['id'] ?>'"><?php echo $row['email']; ?></a></td> -->

                    <?php $string_areas_tabela="";
                    if($row['loja_id']!="" && $row['loja_id']!=" " && $row['loja_id']!="null" && $row['loja_id']!="NULL")
    { ?>
                    <td><a <?php $url= "editar_user_confirmado.php?id=" . $row['id'] . "&nome=". $row['nome']. "&loja=". $row['localizacao_loja']  . "&loja_id=". $row['loja_id'];

                    $stringAreas=$row['areas'];
                    $arrayareas=explode(', ',$stringAreas);
                    // $url=$url.http_build_query(array('areas'=>$arrayareas));
                    $area_num=0;
                    foreach($arrayareas as $area){
                    $url=$url . "&area" . $area_num ."=". $area;
                    $area_num=$area_num+1;
                    }
                    $url=$url."&areas_quantidade=" . $area_num;
                    ?> href='<?php echo $url ?>'><?php echo $row['email']; ?></a>
                    </td>
                    <?php
                    foreach($arrayareas as $area){ 
                      if($string_areas_tabela==""){
                      $string_areas_tabela='<i class="fas fa-arrow-circle-right"></i>'.$area;
                      }else{
                        $string_areas_tabela=$string_areas_tabela . "<br />" . '<i class="fas fa-arrow-circle-right"></i>'." " . $area;
                      }
                       } 
                    }
                    else{ ?>
                    <td><a
                            href='<?php echo "editar_user_confirmado.php?id=" . $row['id'] . "&nome=". $row['nome']?>'><?php echo $row['email']; ?></a>
                    </td>
                    <?php } ?>
                    <td><?php echo $row['localizacao_loja']; ?></td>

                    <?php if($string_areas_tabela!=""){ ?>
                    <td id="td_areas"><?php echo $string_areas_tabela ?></td>
                    <?php }else{?>
                      
                      <?php } ?>
                    <!-- <td><?php echo $row['areas']; ?></td> -->
                </tr>

                <?php
      }
     
      ?>
            </tbody>
        </table>
    </div>


    <div class="text-center">
        <div class="container">
            <!-- Dialog -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-dialog">
                        $id=
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Alteração de Loja e Areas!</h5>
                            </div>
                            <div class="modal-body">

                                <div class="fetched-data"></div>

                                <p>
                                <h3 style="color:#28a745"><b>Editar</b></h3>
                                <h7>Garanta que todos os campos ficam preenchidos!</h7>
                                </p>
                            </div>
                            <form id="form1" method="POST">
                                <label for="lojas">Escolha uma loja</label>
                                <select name="lojas" id="lojas">
                                    <option value="">Selecione a Loja</option>
                                    <?php
              $id= $_POST[$row['id']];
              echo $id;
              $selectLojas='SELECT * FROM lojas_agriloja';
              $lista = $con->connect()->prepare($selectLojas);
              $lista->setFetchMode(PDO::FETCH_ASSOC);?>
                                    <!-- <input name="user_id" id="user_id" type="text" style='display:none'> -->
                                    <?php
              if($lista->execute()){
                  $array=array();
                  foreach($lista as $rowLojas){
                      ?>

                                    <option value="<?php $rowLojas['loja_id']?>">
                                        <?php echo $rowLojas['localizacao_loja']?></option>

                                    <!-- nesta linha de codigo é preciso obter o valor da loja que esta na base de dados que ele vai sobrepor 
                       <option value="<? /* echo $row_list['emp_id']; ?>"<? if($row_list['emp_id']==$select){ echo "selected"; } */ ?>>  
                       <?/* echo $row_list['emp_name']; */?>  
                    </option>   -->
                                    <?php
                  }
              }
              ?>
                                </select>


                                <div style="width:200px;border-radius:6px;margin:0px auto">

                                    <table>
                                        <tr>
                                            <td colspan="2">Selecionar Areas:</td>
                                        </tr>
                                        <?php
              $selectAreas='SELECT * FROM area';
              $listaAreas = $con->connect()->prepare($selectAreas);
              $listaAreas->setFetchMode(PDO::FETCH_ASSOC);
              
              if($listaAreas->execute()){
                  $array=array();
                  foreach($listaAreas as $rowArea){
                      ?>
                                        <tr>
                                            <td><label
                                                    for="checkbox<?php $rowArea['id_area']?>"><?php echo $rowArea['descricao_area']?></label>
                                            </td>
                                            <td><input type="checkbox" name="areas[]"
                                                    value="<?php $rowArea['id_area']?>"></td>
                                        </tr>
                                        <?php
                  }
              }
              ?>
                                    </table>
                                </div>


                                <div class="modal-footer">

                                    <input type="submit" name="alterar" class="btn btn-success" value="Alterar"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
/* if(isset($_POST['alterar'])){

    $user_id=$_POST['id'];
    $loja_id=$_POST['lojas'];
    $checkbox=$_POST['areas'];

    $con = new Db();

    $queryInserirAreasUser="INSERT INTO user_area_loja('user_id','area_id','loja_id') VALUES(?,?,?)";
    $statement = $con->connect()->prepare($queryInserirAreasUser);
    foreach($checkbox as $opcaoCheck){  
        $statement->bindParam(1,$user_id);
        $statement->bindParam(2,$opcaoCheck);
        $statement->bindParam(3,$loja_id);
       $statement->execute();
        
       
        ?>

    <?php
    } 
    header('Location: users_confirmados.php');
        $statement->die;
        exit; 
} */
   ?>
</body>