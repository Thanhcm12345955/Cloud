<?php
require_once('header.php');
require_once('connect.php');

if(isset($_POST['btnlogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT `username` FROM `users` WHERE `username` = ? and `password` = ?";
    $c = new Connect();
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql);
    $valueArray = ["$username", "$password"]; // -> push gia tri vao dau ? o value
    $stmt = $re->execute($valueArray);
    $numrow = $re->rowCount(); //khi chạy trả bao nhiêu dòng
    $rows = $re->fetch(PDO::FETCH_BOTH);
    if($numrow ==1){
        //echo "Login successfully";
        setcookie("cc_username",$rows['username'],time()+3600);
        // echo $rows['username'];
        // echo $_COOKIE['cc_username'];
        header("Location: index.php");
    }else{
        echo "Something wrong!!!!";
    }
}
?>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <div class="container">
            <h2>Login</h2>
            <form action="" name="formReg" method="POST">
                <div class="row mb-3">
                    <label for="" class="col-lg-4">Username</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="username">
                    </div>  
                </div>
                <div class="row mb-3">
                    <label for="" class="col-lg-4">Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div> 
                    <div class="row mb-3">
                        <div class="d-grid mx-auto col-5">
                            <input type="submit" value="Login" class="btn btn-primary" name="btnlogin">
                        </div>
                    </div>
            </form>
        </div>
    </body>
