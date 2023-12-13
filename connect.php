<?php
class Connect{
    public $server;
    public $dbname;
    public $uname;
    public $pass;
    public function __construct(){
        $this->server = "d6rii63wp64rsfb5.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->dbname = "z0mawdcqcn6strv9";
        $this->uname = "c5jqukpgfykwp8d2";
        $this->pass = "idoy019pcpwg28bi";
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
