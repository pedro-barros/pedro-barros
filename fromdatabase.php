<?php
require 'uploadconn.php';
$con = new Db();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping</title>
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
  <!-- <form method="POST" action="#">
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="procurar" placeholder="Search...">
          <a class="search_icon" onclick="submit"><i class="fas fa-search"></i></a>
        </div>
      </div>
  </form> -->
  <?php

  // 0 para permanente 1 para sazonal


  // $query = "SELECT * , IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM artigos INNER JOIN shopping ON artigos.cod_barras=shopping.cod_barras";

  // $query = "SELECT * , IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM shopping LEFT JOIN artigos ON shopping.cod_barras=artigos.cod_barras";

  $query = "SELECT * FROM shopping LEFT JOIN artigos ON shopping.cod_barras=artigos.cod_barras LEFT JOIN user_area_loja ON shopping.user_id= user_area_loja.user_id LEFT JOIN users ON user_area_loja.user_id=users.id LEFT JOIN area ON shopping.area_shopping=area.id_area";


  // $query = "SELECT * FROM users INNER JOIN user_area_loja ON user_area_loja.user_id=users.id INNER JOIN area ON user_area_loja.area_id=area.id_area INNER JOIN lojas_agriloja ON user_area_loja.loja_id=lojas_agriloja.loja_id WHERE users.id='5'";
  // 
  // SELECT * , IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM shopping LEFT JOIN artigos ON shopping.cod_barras=artigos.cod_barras INNER JOIN users ON shopping.user_id= user_area_loja.user_id
  // 
  // INNER JOIN area ON shopping.user_id=area.id_area
  // $select = $con->connect()->prepare($query);
  // $select->setFetchMode(PDO::FETCH_ASSOC);
  // $select->execute();

  // foreach ($select as $row) {
  // 
  ?>
  <!-- //   <div class="card">
  //     <div class="card-body">
  //       <div class="text-center">
  //         <h4><?php echo "Loja: " . $row['loja']; ?></h4>
  //         <br>
  //         <h4><?php echo "Concorrente: " . $row['concorrente']; ?></h4>
  //         <br>
  //         <h5><?php echo "Area Artigo: " . $row['descricao_area']; ?></h5>
  //         <br>
  //         <h5><?php echo "Descrição Artigo: " . $row['descricao_artigo']; ?></h5>
  //         <br>
  //         <h4><?php echo "Referência Artigo: " . $row['ref_artigo']; ?></h4>
  //         <br>
  //         <br>
  //         <h5><?php echo "Código de Barras: " . $row['cod_barras']; ?></h5>

  //         <h5><?php echo "Cabaz: " . $row['cabaz']; ?></h5>
  //         <h5><?php echo "Preço Agriloja: " . $row['euros'] . "." . $row['centimos'] . "€"; ?></h5>
  //         <h5><?php echo "PVP Normal: " . $row['pvp_normal'] . "€"; ?></h5>
  //         <h5><?php echo "PVP Promo: " . $row['pvp_promo'] . "€"; ?></h5>
  //         <h5><?php echo "Observações: " . $row['observacoes']; ?></h5>
  //         <h5><?php echo "Data Recolha: " . $row['data_recolha']; ?></h5>
  //         <h5><?php echo "Utilizador: " . $row['nome']; ?></h5>
  //         <br>
  //       </div>

  //     </div>
  //   </div> -->

  <?php
  // }
  // 
  ?>


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

        // $query="SELECT lojas_agriloja.localizacao_loja as loja,shopping.cod_barras,shopping.concorrente,shopping.cabaz,shopping.pvp_normal,shopping.pvp_promo,shopping.data_recolha,shopping.observacoes,users.nome,artigos.descricao_artigo,area.descricao_area,artigos.ref_artigo,artigos.euros ,artigos.centimos,

        // IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM shopping 

        // JOIN artigos ON shopping.cod_barras=artigos.cod_barras 
        // JOIN user_area_loja ON shopping.user_id= user_area_loja.user_id 
        // JOIN users ON user_area_loja.user_id=users.id
        // JOIN lojas_agriloja ON shopping.loja=lojas_agriloja.localizacao_loja
        // JOIN area ON shopping.cod_barras=artigos.cod_barras WHERE shopping.cod_barras=artigos.cod_barras";
        $query = "SELECT lojas_agriloja.localizacao_loja as loja,shopping.cod_barras,shopping.concorrente,shopping.cabaz,shopping.pvp_normal,shopping.pvp_promo,shopping.data_recolha,shopping.observacoes,users.nome,artigos.descricao_artigo,area.descricao_area,artigos.ref_artigo,artigos.euros ,artigos.centimos , IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM artigos INNER JOIN shopping ON artigos.cod_barras=shopping.cod_barras JOIN users ON shopping.user_id=users.id JOIN lojas_agriloja ON shopping.loja=lojas_agriloja.localizacao_loja JOIN area ON artigos.id_area=area.id_area ORDER BY loja";
        // $query = "SELECT * , IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM shopping LEFT JOIN artigos ON shopping.cod_barras=artigos.cod_barras LEFT JOIN user_area_loja ON shopping.user_id= user_area_loja.user_id LEFT JOIN users ON user_area_loja.user_id=users.id";

        //LEFT JOIN user_area_loja ON shopping.user_id= user_area_loja.user_id LEFT JOIN users ON user_area_loja.user_id=users.id LEFT JOIN area ON shopping.area_shopping=area.id_area";

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
  <div class="text-center">
    <div class="container">
      <h3>Para iniciar exportação clique no botão abaixo</h4>
        <!--button para dar trigger ao dialog-->
        <button type="button" class="btn btn-success btn-lg" id="btn_export"data-toggle="modal" data-target="#myModal">Exportar</button>

        <!-- Dialog -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <!-- Corpo do Dialog -->
            <div class="modal-content">
              <div class="modal-header">
                <h6>Pretende mesmo exportar a a sua lista de shopping? </h5>
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
              </div>
              <div class="modal-body">
                <p>
                <h3 style="color:#ff0000"><b>Atenção</b></h3>
                <h4>Esta ação irá eliminar o registo na base de dados!</h4>
                </p>
              </div>
              <div class="modal-footer">
                <form action="export.php" method="POST">
                  <input type="submit" name="export" class="btn btn-danger" value="Exportar">
                </form>
              </div>

            </div>

          </div>
        </div>


    </div>
  </div>
</body>