<?php
require_once('header.php');
require_once('connect.php');
$c = new Connect();
$dblink = $c->connectToMySQL();

if(isset($_GET['action']) && $_GET['action']=="delete" && isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `product` WHERE pid=?";
    $re = $dblink->prepare($sql);
    $re->execute([$id]);
    echo "Product deleted successfully";
}

$sql = "SELECT * FROM `product`";

if(isset($_GET['search'])){
    $search = $dblink->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM `product` WHERE `pname` LIKE '%$search%' OR `pinfo` LIKE '%$search%'";
}

$re = $dblink->query($sql);

if($re->num_rows>0){
?>
<div class="container">
    <!-- Search form -->
    <form action="" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products" name="search">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <div class="row justify-content-center">
        <?php
        while($row=$re->fetch_assoc()){
        ?>
        <div class="col-md-3 py-2">
            <div class="card text-black">
                <img src="./img/<?=$row['pimage']?>" class="card-img-top" alt="Product Image" />
                <div class="card-body">
                    <div class="text-center mt-1">
                        <h4 class="card-title">
                            <a href="detail.php?id=<?=$row['pid']?>">
                                <?=$row['pname']?>
                            </a>
                        </h4>
                        <div class="d-grid gap-2 my-4">
                            <h6 class="text-primary mb-1 pb-3"><?=$row['pprice']?></h6>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <button type="button" class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
                            <a href="edit_product.php?id=<?=$row['pid']?>" style="color: white; text-decoration: none;">Edit</a>
                        </button>
                        <button type="button" class="btn btn-danger flex-fill ms-1" onclick="deleteProduct(<?=$row['pid']?>)">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
} else {
    echo "No products found.";
}
?>
<script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            window.location = 'your_products_page.php?action=delete&id=' + id;
        }
    }
</script>


