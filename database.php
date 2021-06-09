<?php
require "uploadconn.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $database;

    public function __construct()
    {
        $this->connect=null;
        $this->data = null;
        $this->sql = null;
        $dbc = new db();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->database = $dbc->database;
    }

    function connect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        return $this->connect;
    }

  

   function logIn($table, $email, $pass)
    {
        $conn=new Db();
        $sql = "SELECT * FROM " . $table . " WHERE email = '" . $email . "'";
        // $sql = "SELECT user_area_loja.id_user_area_loja,user_area_loja.user_id,users.nome, users.email, lojas_agriloja.localizacao_loja, area.descricao_area FROM " . $table . " JOIN users ON user_area_loja.user_id=users.id JOIN lojas_agriloja ON user_area_loja.loja_id=lojas_agriloja.loja_id JOIN area ON user_area_loja.area_id=area.id_area WHERE email ='".$email."'";
        $stmt=$conn->connect()->prepare($sql);
        if($stmt->execute()){
            $users=$stmt->fetchAll();
            foreach($users as $user){
                //separar todos os user com aquele email
                $dbemail=$user['email'];
                $dbpassword=$user['pass'];
               /*  $bduserid=$user['user_id'];
                $dbloja=$user['localizacao_loja'];
                $dbarea=$user['descricao_area']; */
                
                if($email==$dbemail && password_verify($pass,$dbpassword)){  
                    // echo $bduserid. $dbloja. $dbarea;
                    $login = true;                 
                }else{                       
                    $login = false;
                }
            }    
                 
        }
        return $login;  
        
    }

    function signUp($table, $nome, $email, $password)
    {
       $conn=new Db();
       $password = password_hash($password, PASSWORD_DEFAULT);
       $stmt=$conn->connect()->prepare( "INSERT INTO " . $table . " (`nome`, `email`, `password`)VALUES(?,?,?)");
       $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function guardarShopping($table,$cod_barras,$concorrente,$loja,$cabaz,$pvp_normal,$pvp_promo,$data_recolha,$observacoes,$id){
        $conn=new Db();
        $stmt=$conn->connect()->prepare("INSERT INTO ".$table."(`cod_barras`, `concorrente`,`loja`, `cabaz`,`pvp_normal`, `pvp_promo`, `data_recolha`,`observacoes`,`user_id`)VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $cod_barras);
        $stmt->bindParam(2, $concorrente);
        $stmt->bindParam(3, $loja);
        $stmt->bindParam(4, $cabaz);
        $stmt->bindParam(5, $pvp_normal);
        $stmt->bindParam(6, $pvp_promo);
        $stmt->bindParam(7, $data_recolha);
        $stmt->bindParam(8, $observacoes);
        $stmt->bindParam(9, $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }



}

?>
