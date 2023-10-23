<?php
class Connect{
    public $server;
    public $dbname;
    public $uname;
    public $pass;
    public function __construct(){
        $this->server = "tvcpw8tpu4jvgnnq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->dbname = "vta9ll0wskbeykiw";
        $this->uname = "n61ng5kc3pzx5zy5";
        $this->pass = "w0drw70obwimr3ll";
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
