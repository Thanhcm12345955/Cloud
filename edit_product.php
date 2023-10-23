<?php
require_once('header.php');
require_once('connect.php');

// Add the product update functionality
if (isset($_POST['btnEdit'])) {
    $id = $_POST['id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pinfo = $_POST['pinfo'];
    $pdate = $_POST['pdate'];
    $pquan = $_POST['pquan'];
    $pcatid = $_POST['pcatid'];

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $sql = "UPDATE `product` SET `pname`=?, `pprice`=?, `pinfo`=?, `pdate`=?, `pquan`=?, `pcatid`=? WHERE `pid`=?";
    $re = $dblink->prepare($sql);
    $valueArray = [$pname, $pprice, $pinfo, $pdate, $pquan, $pcatid, $id];
    $stmt = $re->execute($valueArray);

    if ($stmt) {
        echo "Product updated successfully";
    } else {
        echo "Failed to update product";
    }
}

// Fetch the product data to pre-fill the form for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $c = new Connect();
    $dblink = $c->connectToPDO();
    $sql = "SELECT * FROM `product` WHERE `pid`=?";
    $re = $dblink->prepare($sql);
    $re->execute([$id]);
    $product = $re->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="container">
    <h2>Edit Product</h2>
    <form action="" name="formEdit" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['pid']; ?>">
        <div class="row mb-3">
            <label for="pid" class="col-lg-1">Product id:</label>
            <div class="col-lg-11">
                <input type="text" class="form-control" name="pid" value="<?php echo $product['pid']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pname" class="col-lg-1">Product name:</label>
            <div class="col-lg-11">
                <input type="text" class="form-control" name="pname" value="<?php echo $product['pname']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pprice" class="col-lg-1">Price:</label>
            <div class="col-lg-11">
                <input type="text" class="form-control" name="pprice" value="<?php echo $product['pprice']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pinfo" class="col-lg-1">Description:</label>
            <div class="col-lg-11">
                <input type="text" class="form-control" name="pinfo" value="<?php echo $product['pinfo']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pdate" class="col-lg-1">Date:</label>
            <div class="col-lg-11">
                <input type="date" class="form-control" name="pdate" value="<?php echo $product['pdate']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pquan" class="col-lg-1">Quantity:</label>
            <div class="col-lg-11">
                <input type="text" class="form-control" name="pquan" value="<?php echo $product['pquan']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pimage" class="col-lg-1">image:</label>
            <div class="col-lg-11">
                <input type="file" class="form-control" name="pimage"> value="<?php echo $product['pimage']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pcatid" class="col-lg-1">Cat id:</label>
            <div class="col-lg-11">
                <input type="text" class="form-control" name="pcatid" value="<?php echo $product['pcatid']; ?>">
            </div>
        </div>
        <!-- Add other input fields for price, info, date, quantity, category ID, etc. -->
        <div class="row mb-3">
            <div class="d-grid mx-auto col-3">
                <input type="submit" value="Edit" class="btn btn-primary" name="btnEdit">
            </div>
        </div>
    </form>
</div>
</body>
</html>



