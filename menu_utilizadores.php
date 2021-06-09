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
      width: 100%;
      padding-right: 5px;
      padding-left: 5px;
      margin-right: auto;
      margin-left: 40%;
    }

    td {
      text-align: center;
    }

    .cabecalho_table_gestao {
    width: 50%;
      text-align: center;
      color: black;
      font-weight: bold;
    }
  
    #tabela_gestao {
      width: 100%;
      align-content: center;
    }
  </style>

<div class="container">
        <div class="card-columns d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
            <h5 class="card-title">Utilizadores Confirmados</h5>
                <img class="card-img-top" src="img\upload.png" alt="users confirmados">
                <div class="card-body">
                    <p class="card-text">Poderá ser feita a definição da area do utilizador.</p>
<!--                     com a class stretched-link para que todo o card dê para clicar -->
                    <a href="users_confirmados.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
            <h5 class="card-title">Gestao Utilizadores</h5>
                <img class="card-img-top" src="img\shopping-cart.png" alt="utilizadores a aguardar confirmacao">
                <div class="card-body">
                    <p class="card-text">Aqui verá os utilizadores que estam a aguardar confirmação para acesso à APP movel </p>
<!--                     com a class stretched-link para que todo o card dê para clicar -->
                    <a href="gestao_utilizadores.php" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>