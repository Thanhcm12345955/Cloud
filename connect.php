<?php
class Connect{
    public $server;
    public $dbname;
    public $uname;
    public $pass;
    public function __construct(){
        $this->server = "dfkpczjgmpvkugnb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->dbname = "ou65fgyiv9zgo1j8";
        $this->uname = "e94w2xkguigkoe6m";
        $this->pass = "szkpq13fn3go6859";
    }
    function connectToMySQL():mysqli{
        $conn = new mysqli($this->server,$this->uname,$this->pass,$this->dbname);

        if($conn->connect_error){
            die("Failed ".$conn->connect_error);
        }else{
            // echo "Connect!";
        }
        return $conn;
    }

    //option 2 : PDO
    function connectToPDO():PDO{
        try{
            $conn = new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->uname,
            $this->pass);
            // echo "Connect! PDO";
        }catch(PDOException $e){
            print("Failed ".$e->getMessage());
        }
        return $conn;
    }
 
}
$c = new Connect();
$c->connectToMySQL();
echo "<br>";
$c->connectToPDO();
?>
