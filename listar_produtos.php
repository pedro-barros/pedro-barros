<?php
require 'uploadconn.php';
$con = new Db();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>

    <?php include('head.php') ?>
</head>

<body style="overflow-y: visible!important">
    <?php include('navhamburguer.php') ?>
    
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
                <input class="search_input" type="text" name="" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            
            </div>
        </div>

    <div class="container">
        <!--//Listagem por PDO!-->
        <?php
        $query = "SELECT `ref_artigo`, `descricao_artigo`, area.descricao_area, `cod_barras`, `euros`, `centimos` FROM `artigos` LEFT JOIN area ON artigos.id_area=area.id_area";
        $select = $con->connect()->prepare($query);

        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();


        foreach ($select as $row) {
            ?>
        
              <div class="card">
                <div class="card-body">
                  <div class="text-center">
        
                  <h3><?php echo "Referencia Artigo: " . $row['ref_artigo']; ?></h3>
        
                  <h4><?php echo "Descrição Artigo: " . $row['descricao_artigo']; ?></h4>
        
                    <br>
        
                    <h5><?php echo "Area: " . $row['descricao_area']; ?></h5>
                        <h5><?php echo "EAN: " . $row['cod_barras']; ?></h5>
                        <h5><?php echo "Preço: " . $row['euros'] . "," . $row['centimos']; ?></h5>        
                  </div>
        
                </div>
              </div>
        
        
            <?php
            }
            ?>
    </div>

</body>
</html>