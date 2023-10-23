<?php
// session_start(); // Start the session

// // Check if the user is logged in
// if (!isset($_SESSION['employee_id'])) {
//     header("Location: login.php"); // Redirect to the login page if the user is not logged in
//     exit();
// }

require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnAdd'])){
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pinfo = $_POST['pinfo'];
    $pdate = $_POST['pdate'];
    $pquan = $_POST['pquan'];
    $pcatid = $_POST['pcatid'];
    $imagname = str_replace('','-',$_FILES['pimage']['name']);
    $flag = move_uploaded_file($_FILES['pimage']['tmp_name'],'./img/'.$imagname);
    if($flag){
    $sql = "INSERT INTO `product`(`pname`, `pprice`, `pinfo`, `pimage`, `pquan`, `pcatid`, `pdate`) 
    VALUES (?,?,?,?,?,?,?)";

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql);
    $valueArray = [$pname,$pprice,$pinfo,$imagname,$pquan,$pcatid,$pdate];
    $stmt = $re->execute($valueArray);
    if($stmt) echo "Congrats";
}

}
  


?>
        <div class="container">
            <h2>More new products</h2>
            <form action="" name="formReg" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">Product name:</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="pname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">Price:</label>
                    <div class="col-lg-11">
                        <input type="number" class="form-control" name="pprice">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">Description:</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="pinfo">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">Date:</label>
                    <div class="col-lg-11">
                        <input type="date" class="form-control" name="pdate">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">QUantity:</label>
                    <div class="col-lg-11">
                        <input type="number" class="form-control" name="pquan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">image:</label>
                    <div class="col-lg-11">
                        <input type="file" class="form-control" name="pimage">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">Cat Id:</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="pcatid">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="d-grid mx-auto col-3">
                    <input type="submit" value="Add" class="btn btn-primary" name="btnAdd">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>