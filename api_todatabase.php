<?php
// require('uploadconn.php');
// $bdh = new Db();
// /* 
// // $cod_barras = $_POST["cod_barras"];
// // $concorrente = $_POST["concorrente"];
// // $loja = $_POST["loja"];
// // $cabaz = $_POST["cabaz"];
// // $pvp_normal = $_POST["pvp_normal"];
// // $pvp_promo = $_POST["pvp_promo"];
// // $data_recolha = $_POST["data_recolha"];
// // $observacoes = $_POST["observacoes"];
// // $user_id = $_POST["id"];
 
// $cod_barras = 4000498001400;
// $concorrente = "MAXMAT";
// $loja = "CASTELO BRANCO";
//  $cabaz = 1;
//  $pvp_normal = 16.21;
//  $pvp_promo = 12.99;

// // recebida pelo backoffice
// // $data_recebida_back_office

// // vinda da app
//  $data_recolha = date("d-m-Y");
// $observacoes = "jhbckjsdcbjnvj";
// $user_id = 6;


// $stmt = $bdh->connect()->prepare("INSERT INTO shopping(`cod_barras`, `concorrente`,`loja`, `cabaz`,`pvp_normal`, `pvp_promo`, `data_recolha`,`observacoes`,`user_id`)VALUES (?,?,?,?,?,?,?,?,?)");
// $stmt->bindParam(1, $cod_barras);
// $stmt->bindParam(2, $concorrente);
// $stmt->bindParam(3, $loja);
// $stmt->bindParam(4, $cabaz);
// $stmt->bindParam(5, $pvp_normal);
// $stmt->bindParam(6, $pvp_promo);
// $stmt->bindParam(7, $data_recolha);
// $stmt->bindParam(8, $observacoes);
// $stmt->bindParam(9, $user_id);

// if($stmt->execute()){

//     echo "recebido";
// }else {
//     echo "correu Mal";
// }
//  */
// require "database.php";
// $db = new DataBase();

// $cod_barras=$_POST['cod_barras'];
// $concorrente=$_POST['concorrente'];
// $loja=$_POST['loja'];
// $cabaz=$_POST['cabaz'];
// $pvp_normal=$_POST['pvp_normal'];
// $pvp_promo=$_POST['pvp_promo'];
// $data_recolha=$_POST['data_recolha'];
// $observacoes=$_POST['observacoes'];
// $id=$_POST['id'];
 

// if (isset($_POST['cod_barras']) && isset($_POST['concorrente']) && isset($_POST['loja'])&& isset($_POST['cabaz'])&& isset($_POST['pvp_normal'])&& isset($_POST['pvp_promo'])&& isset($_POST['data_recolha'])&& isset($_POST['observacoes'])&& isset($_POST['id'])) {
//     if ($db->connect()) {
//         if ($db->guardarShopping("shopping", $cod_barras,$concorrente,$loja,$cabaz,$pvp_normal,$pvp_promo,$data_recolha,$observacoes,$id)) {
//             echo "Recebido";
//         } else echo "Algo correu mal";
//     } else echo "Erro: Impossivel conectar à base de dados";
// } else echo '"Todos os campos são necessários!" .$cod_barras." ".
// $concorrente." ".$loja." ".$cabaz." ".$pvp_normal." ".$pvp_promo." ".$data_recolha." ".$observacoes." ".$id';




require('uploadconn.php');
$bdh = new Db();

if($_SERVER['REQUEST_METHOD']=='POST'){

    // $data = file_get_contents("php://input");
    // $resposta=json_decode($data,FALSE);
    // $resposta_encoded = json_encode($resposta);
    // $resposta_decoded = (array)json_decode($resposta_encoded,true);
$cod_barras      = $_POST['cod_barras'];
$concorrente     = $_POST['concorrente'];
$loja            = $_POST['loja'];
$cabaz           = $_POST['cabaz'];
$pvp_normal      = $_POST['pvp_normal'];
$pvp_promo       = $_POST['pvp_promo'];
$data_recolha    = $_POST['data_recolha'];
$observacoes     = $_POST['observacoes'];
$id              = $_POST['id'];
// $artigo=array();
    // $shopping_list
// $conteudo=array();
// $conteudo=$resposta_decoded;

// $sucessos=0;
// $total=count($resposta_decoded,COUNT_NORMAL);
// $nao_enviados=array();

        $stmt = $bdh->connect()->prepare("INSERT INTO shopping(`cod_barras`, `concorrente`,`loja`, `cabaz`,`pvp_normal`, `pvp_promo`, `data_recolha`,`observacoes`,`user_id`)VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$cod_barras  );
        $stmt->bindParam(2,$concorrente );
        $stmt->bindParam(3,$loja        );
        $stmt->bindParam(4,$cabaz       );
        $stmt->bindParam(5,$pvp_normal  );
        $stmt->bindParam(6,$pvp_promo   );
        $stmt->bindParam(7,$data_recolha );
        $stmt->bindParam(8,$observacoes );
        $stmt->bindParam(9,$id          );

        if($stmt->execute()){
            echo "Recebido";
            
        }else {
           echo"Artigo nao recebido";
        }
    

} else{
         echo "O Pedido foi mal enviado";
}   




   /*  $content   = file_get_contents( "php://input" );
$response  = json_decode( $content, TRUE );
$orderlist = json_decode( $response['SHOPPING_LIST'], TRUE ); */
    
    //echo $orderlist[0][order_id][0];
    
// $vardump=var_dump($content);
//     $print1=print_r($response);
//     $print2=print_r($orderlist);
// echo  "DATA: ". $data ." ";


//     foreach($orderlist AS $row ){
//       echo $row["cod_barras"];
//     } 
    
//           echo $response;