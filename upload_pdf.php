<?php
require 'uploadconn.php';
$bdh = new Db();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Upload</title>
  
  <?php include('head.php') ?>

</head>

<body>
  <?php
  include('navhamburguer.php'); 
  ?>
 
  <?php
  if (isset($_POST['btn3'])) {
    $nome = $_FILES['myfile']['name'];
    $tipoficheiro_extensao = $_FILES['myfile']['type'];
    $ficheiro = file_get_contents($_FILES['myfile']['tmp_name']);
    $extension = pathinfo($nome, PATHINFO_EXTENSION);
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['jpg','png'])) {
      echo '<div id="div-aviso1">
      <span class="text-center font-weight-bold badge badge-danger text-wrap" style="font-size: 20px">Os ficheiros devem ser imagens com extenção .JPG ou .PNG</span>
      </div>';
    } else if ($_FILES['myfile']['size'] > 3000000) { // O ficheiro nao será maior que cerca de 2,8MB
      echo '<div id="div-aviso2">
      <span class="text-center font-weight-bold badge badge-danger text-wrap" style="font-size: 20px">Ficheiro grande demais!</span></div>';
    } else {
      $stmt = $bdh->connect()->prepare("INSERT INTO pdf(`nome`, `tipoficheiro_extensao`, `ficheiro`)VALUES (?,?,?)");
      $stmt->bindParam(1,$nome);
      $stmt->bindParam(2,$tipoficheiro_extensao);
      $stmt->bindParam(3,$ficheiro);
      $stmt->execute();
    }
  }
  ?>


  <div id="conteiner-upload">
    <form method="POST" enctype="multipart/form-data">
      <div class="input-group">
        <div class="input-group-prepend">
          <input type="submit" name="btn3" id="btn3" class="btn btn-secondary" value="Upload" disabled></input>
        </div>
        <div class="custom-file">
          <label for="myfile" id="labelfile" name="myfile" class="custom-file-label" style="font-weight: bold"></label>
          <input type="file" name="myfile" id="myfile" class="custom-file-input">
        </div>
      </div>
    </form>
    <br>
  </div>
  <!--   sem isto nao muda o nome da label -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/upload.js"></script>
</body>

</html>