<?php
class Connect{
    public $server;
    public $dbname;
    public $uname;
    public $pass;
    public function __construct(){
        $this->server = "d6rii63wp64rsfb5.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->dbname = "tzvcbmxjjcxrbozd";
        $this->uname = "vtm6ycij7e1iqye4";
        $this->pass = "mlqarkmk2dp0ronq";
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
