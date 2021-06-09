<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <?php include('head.php'); ?>
    <style>
        ol#displaydospdf li {
            text-transform: capitalize;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            padding: 3px;
        }
    </style>
</head>



<body style=" overflow-y: visible!important;">
    <?php include('navhamburguer.php') ?>
    <div id="divpdfs">
        <br>
        <h1 class="display-1 text-center" id="cliquedeletepdf"><strong>Clique no nome para eliminar!</strong></h1>

        <br>
        <ol id="displaydospdf">
            <?php
            require 'uploadconn.php';
            $bdh = new Db();
            $stat = $bdh->connect()->prepare("SELECT * FROM pdf");
            $stat->execute();
            while ($row = $stat->fetch()) {

                /* echo "<li><a target='_blank' href='vista.php?id=" . $row['id'] . "'>" . $row['nome'] . "</a><br>
            <embed src='ficheiro:" . $row['tipoficheiro_extensao'] . ";base64," . base64_encode($row['ficheiro']) . "'/></li>"; */

                /***************************COM O SRC A FICHEIRO NAO FUNCIONA TEM QUE SER MESMO 'DATA' *********************************/

                /* echo '<li><img src="ficheiro:'.$row["tipoficheiro_extensao"].';base64,'.base64_encode($row["ficheiro"]).'"></li>';*/

                echo '<li style="padding-left: 5%"><a href="vista.php?id=' . $row['id'] . '">' . $row['nome'] . '</a><br>
            <embed style="width: 200px!important" class="d-inline-block" src="data:' . $row['tipoficheiro_extensao'] . ';base64,' . base64_encode($row['ficheiro']) . '"></li>';
            };
            ?>
        </ol>
    </div>
</body>

</html>