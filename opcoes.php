<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opções</title>
    <?php include('head.php') ?>
</head>

<body>
    <?php include('navhamburguer.php') ?>

    <div class="container">
        <div class="card-columns d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
            <h5 class="card-title">Upload de Folhetos</h5>
                <img class="card-img-top" src="img\upload.png" alt="upload">
                <div class="card-body">
                    <p class="card-text">Poderás fazer upload das imagens dos folhetos.</p>
<!--                     com a class stretched-link para que todo o card dê para clicar -->
                    <a href="upload_pdf.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
            <h5 class="card-title">Lista de artigos</h5>
                <img class="card-img-top" src="img\list.png" alt="lista produtos">
                <div class="card-body">
                    <p class="card-text">Aqui verás uma página com todos os artigos listados.</p>
<!--                     com a class stretched-link para que todo o card dê para clicar -->
                    <a href="listar_produtos.php" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>