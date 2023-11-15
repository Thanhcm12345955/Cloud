<?php
require_once('connect.php');
$c = new Connect();
$dblink = $c->connectToMySQL();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform deletion
    $deleteSql = "DELETE FROM `product` WHERE pid=?";
    $deleteStmt = $dblink->prepare($deleteSql);
    $deleteStmt->execute([$id]);
    echo "Product deleted successfully";
} else {
    echo "Invalid request";
}
?>
<script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            window.location = 'your_products_page.php?action=delete&id=' + id;
        }
    }
</script>


