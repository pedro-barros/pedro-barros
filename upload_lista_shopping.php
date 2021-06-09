<?php
require 'uploadconn.php';
$db = new Db();
// $conn=$db->getmySQLIConnection();
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    
    // if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName,"r");
        while (($line = fgetcsv($file,100000,";")) != FALSE) {
            //$line is an array of the csv elements
   
           $ref_artigo = "";
            if (isset($line[0])) {
                $ref_artigo=$line[0];
               
            }
            $descricao_artigo = "";
            if (isset($line[1])) {
                $descricao_artigo = $line[1];
            }
            $descricao_area = "";
            if (isset($line[2])) {
                $descricao_area = $line[2];
            }
            $cod_barras = "";
            if (isset($line[3])) {
                $cod_barras =$line[3];
            }
            $euros = "";
            if (isset($line[4])) {
                $euros = $line[4];
            }
            $centimos = "";
            if (isset($line[5])) {
                $centimos =$line[5];
                
            }                     

            $stmt = $db->connect()->prepare("INSERT INTO lista_shopping_atual(`ref_artigo`,`descricao_area`, `descricao_artigo`, `cod_barras`, `euros`, `centimos` )VALUES (?,?,?,?,?,?)");
            $stmt->bindParam(1,$ref_artigo);
            $stmt->bindParam(2,$descricao_area);
            $stmt->bindParam(3,$descricao_artigo);
            $stmt->bindParam(4,$cod_barras);
            $stmt->bindParam(5,$euros);
            $stmt->bindParam(6,$centimos);

            if ( $stmt->execute()) {
                $type = "SUCESSO";
                $message = "Lista CSV guardada com sucesso!";
            } else {
                $type = "ERRO";
                $message = "Ocurreu um erro ao enviar o ficheiro!";
            }
        }
    
    fclose($file);
}
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nova Lista Shopping</title>
  <?php include('head.php') ?>

<style>
body {
    overflow-y: visible!important;
    font-family: Arial;
    width: 100%;
}

.outer-scontainer {
    margin-left: 5%;
    margin-right: 5%;
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 30px;
}

.input-row {
    margin-top: 0px;
    margin-left: 15px;
    margin-bottom: 20px;
    font-weight: bold;
}

.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
    font-weight: bold;
}

.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
    font-weight: bold;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    margin-left: 5%;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    margin-left: 5%;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    margin-left: 5%;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}


.texto{
    margin-top: 1%;
    padding: 10px;
    margin-left: 35%;
    font-weight: bold;
    color: white;
}

.input-container {
    margin-right: 20px;
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  color: white;
  min-width: 50px;
  text-align: center;
}

#input_delete{
    outline: none;
    padding: 10px;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</head>

<body>
<?php include('navhamburguer.php') ?>
<h2 class="texto">Import CSV file into Mysql using PHP</h2>

<div id="response"
    class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
    <?php if(!empty($message)) { echo $message; } ?>
    </div>
<div class="outer-scontainer">
    <div class="row">

        <form class="form-horizontal" action="" method="post"
            name="frmCSVImport" id="frmCSVImport"
            enctype="multipart/form-data">
            <div class="input-row">
                <label class="col-md-4 control-label">Escolha o Ficheiro CSV
                    </label> <input type="file" name="file"
                    id="file" accept=".csv">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
                <br />

            </div>

        </form>
        <form action="delete_lista_atual.php" method="POST" >
                <i class="fas fa-times fa-1x icon btn btn-danger">  
                    <Button  name="delete" class="btn btn-danger" id="input_delete" onclick="delete_lista_atual.php">Apagar Lista</Button>                  
                </i>
        </form>

    </div>
           <?php
        $sqlSelect = "SELECT * FROM lista_shopping_atual";
        $stmt = $db->connect()->prepare($sqlSelect);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if (! empty($stmt)) {
            ?>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Descrição_Area</th>
                <th>Descrição_Artigo</th>
                <th>EAN</th>
                <th>Preço</th>

            </tr>
        </thead>
<?php
            foreach ($stmt as $row) {

?>

            <tbody>
            <tr>
                <td><?php  echo $row['descricao_area']; ?></td>
                <td><?php  echo $row['descricao_artigo']; ?></td>
                <td><?php  echo $row['cod_barras']; ?></td>
                <td><?php  echo $row['euros'].".". $row['centimos']; ?></td>
            </tr>
                <?php
            }
            ?>
            </tbody>
    </table>
        <?php } ?>
    </div>

</body>

</html>