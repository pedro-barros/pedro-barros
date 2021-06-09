<?php
require 'uploadconn.php';
$con = new Db();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historicos Shopping</title>
  <?php include('head.php') ?>
</head>

<body style=" overflow-y: visible!important;">
  <?php include('navhamburguer.php') ?>
  <!-- comando SQL muito importante para obter todas as informaçoes do artigo e da tabela shopping -->
  <!-- SELECT * FROM artigos INNER JOIN shopping ON artigos.ref_artigo=shopping.ref_artigo -->

  <style>
    td {
      text-align: center;
    }

    .cabecalho_table {
      text-align: center;
      color: black;
      font-weight: bold;
    }

    #tabela_shopping {
      width: 100%;
      align-content: center;
    }

    .container {
      width: 100%;
      padding-right: 5px;
      padding-left: 5px;
      margin-right: auto;
      margin-left: auto;
    }

    #data_recolha {
      font-size: 11px;
    }

    #btn_export{
      margin-bottom: 15px;
    }
  </style>



  <div class="container" id="conteiner_table">
    <h2>Shoppings</h2>
    <br>

    <table class="table table-striped table-hover table-sm table-responsive" id="tabela_shopping">
      <thead class="thead-dark">
        <tr class="cabecalho_table">
          <th>Loja</th>
          <th>Concorrente</th>
          <th>Area</th>
          <th>Artigo</th>
          <th>Referencia artigo</th>
          <th>EAN</th>
          <th>Cabaz</th>
          <th>Preco Agriloja</th>
          <th>PVP Normal</th>
          <th>PVP Promo</th>
          <th>Observacoes</th>
          <th>Data Recolha</th>
          <th>Funcionario</th>
        </tr>
      </thead>
      <tbody>
        <?php

      
        $query = "SELECT lojas_agriloja.localizacao_loja as loja,historicos_shopping.cod_barras,historicos_shopping.concorrente,historicos_shopping.cabaz,historicos_shopping.pvp_normal,historicos_shopping.pvp_promo,historicos_shopping.data_recolha,historicos_shopping.observacoes,users.nome,artigos.descricao_artigo,area.descricao_area,artigos.ref_artigo,artigos.euros ,artigos.centimos , IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM artigos INNER JOIN historicos_shopping ON artigos.cod_barras=historicos_shopping.cod_barras JOIN users ON historicos_shopping.user_id=users.id JOIN lojas_agriloja ON historicos_shopping.loja=lojas_agriloja.localizacao_loja JOIN area ON artigos.id_area=area.id_area ORDER BY loja";
    

        $select = $con->connect()->prepare($query);
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();

        foreach ($select as $row) {
        ?>
          <tr class="cabecalho_table">
            <td><?php echo $row['loja']; ?></td>
            <td><?php echo $row['concorrente']; ?></td>
            <td><?php echo  $row['descricao_area']; ?></td>
            <td><?php echo  $row['descricao_artigo']; ?></td>
            <td><?php echo  $row['ref_artigo']; ?></td>
            <td><?php echo  $row['cod_barras']; ?></td>
            <td><?php echo  $row['cabaz']; ?></td>
            <td><?php echo  $row['euros'] . "." . $row['centimos'] . "€"; ?></td>
            <td><?php echo  $row['pvp_normal'] . "€"; ?></td>
            <td><?php echo  $row['pvp_promo'] . "€"; ?></td>
            <td><?php echo  $row['observacoes']; ?></td>
            <td id="data_recolha"><?php echo  $row['data_recolha']; ?></td>
            <td><?php echo  $row['nome']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>


  <br>
  <br>
</body>