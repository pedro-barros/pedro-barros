<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Shopping</title>
    <?php include('head.php') ?>
</head>

<body>
    <?php include('navhamburguer.php') ?>
    <style>
    
    </style>

    <div class="container">
        <div class="card-columns d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
            <h5 class="card-title">Upload Lista Shopping</h5>
                <img class="card-img-top" src="img\upload.png" alt="upload lista shopping">
                <div class="card-body">
                    <p class="card-text">Poderá ser feito upload da Lista de Shopping.</p>
<!--                     com a class stretched-link para que todo o card dê para clicar -->
                    <a href="upload_lista_shopping.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
            <h5 class="card-title">Shoppings</h5>
                <img class="card-img-top" src="img\shopping-cart.png" alt="lista shopping">
                <div class="card-body">
                    <p class="card-text">Aqui verá uma página com todos os Shopping recebidos.</p>
<!--                     com a class stretched-link para que todo o card dê para clicar -->
                    <a href="fromdatabase.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
            <h5 class="card-title">Históricos</h5>
                <img class="card-img-top" src="img\list.png" alt="lista historicos shopping">
                <div class="card-body">
                    <p class="card-text">Aqui verá uma página com todos os Shoppings que já foram exportados.</p>
<!--                     com a class stretched-link para que todo o card dê para clicar -->
                    <a href="listar_historicos.php" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>