<?php
require 'uploadconn.php';
$con = new Db();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestao Novos Users</title>
  <?php include('head.php') ?>
</head>

<body style=" overflow-y: visible!important;">
  <?php include('navhamburguer.php') ?>


  <style>
   .container_gestao {
    font-size: 1.2em;
        width: 80%;
        padding-right: 5px;
        padding-left: 5px;
        margin-right: auto;
        margin-left: 10%;
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
    td {
      width: 20%;
      text-align: center;
    }

    .cabecalho_table_gestao {
      width: 100%;
        text-align: center;
        color: black;
        font-weight: bold; 
    }
  
    #tabela_gestao {
      font-size: 1.5em;
      width: 100%;
      align-content: center;
      margin-left: 10%;
      margin-right: auto;
    }

    .especial{
      text-align: center!important;
      width: 40%;
    }
    .especial_eliminar{
      text-align: right!important;
      width: 20%!important;
    }
    .especial_confirmar{
      text-align: left!important;
      width: 20%!important;
    }
    h2{
      text-align: center;
    font-weight: bold;
    font-size: 3em;
    padding: 30px;
    }
  
  </style>
  
  <?php
$query = "SELECT * FROM confirmacao_user";
?>


<div class="container_gestao" id="container_gestao">
  <h2>Gestao de Novos Utilizadores</h2>
  <br>

  <table class="table table-striped table-hover table-sm table-responsive" id="tabela_gestao">
    <col>
  <col>
  <colgroup span="2"></colgroup>
    <thead class="thead-dark">
      <tr >
        <th>Nome</th>
        <th>Email</th>
        <th colspan="2" scope="colgroup">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM confirmacao_user";

      $select = $con->connect()->prepare($query);
      $select->setFetchMode(PDO::FETCH_ASSOC);
      $select->execute();

      foreach ($select as $row) {
      ?>
        <tr class="cabecalho_table_gestao">
          <td><?php echo $row['nome']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td class="especial_eliminar"><a href=""<?php echo 'delete_user.php?id='.$row['id_registo'] ?>><i class="</i> fas fa-times fa-2x"></i></a></td>
          <td class="especial_confirmar"><a href="<?php echo 'validar_user.php?id='.$row['id_registo'] ?>"><i class="</i> fas fa-check fa-2x"></i></a></td>
        </tr>
      <?php
      }
     
      ?>
    </tbody>
  </table>
</div>

</body>