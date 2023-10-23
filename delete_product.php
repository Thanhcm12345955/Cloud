<?php
require_once('header.php');
require_once('connect.php');
$c = new Connect();
$dblink = $c->connectToMySQL();

if(isset($_GET['action']) && $_GET['action']=="delete" && isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `product` WHERE pid=?";
    $re = $dblink->prepare($sql);
    $re->bind_param("i", $id);
    if($re->execute()){
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $dblink->error;
    }
}

$sql = "SELECT * FROM `product`";

if(isset($_GET['search'])){
    $search = $dblink->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM `product` WHERE `pname` LIKE '%$search%' OR `pinfo` LIKE '%$search%'";
}

$re = $dblink->query($sql);

if($re){
    if($re->num_rows>0){
?>
<!-- Your HTML code here -->
<div class="container">
    <!-- Search form -->
    <form action="" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products" name="search">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <div class="row justify-content-center">
        <!-- Product display code -->
        <?php
        while($row=$re->fetch_assoc()){
        ?>
        <div class="col-md-3 py-2">
            <div class="card text-black">
                <!-- Card content here -->
                <!-- Display the product information -->
                <div class="d-flex flex-row">
                    <button type="button" class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
                        <a href="edit_product.php?id=<?=$row['pid']?>" style="color: white; text-decoration: none;">Edit</a>
                    </button>
                    <button type="button" class="btn btn-danger flex-fill ms-1" onclick="deleteProduct(<?=$row['pid']?>)">Delete</button>
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
} else {
    echo "Something went wrong with the database query.";
}
?>
<script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            window.location = 'your_products_page.php?action=delete&id=' + id;
        }
    }
</script>


