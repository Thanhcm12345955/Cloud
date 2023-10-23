<html>
    <title>Toy Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="indexsheet" href="index.css">
</html>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- Logo -->
                <a href="index.php" class="navbar-brand">Home page</a>
                <!-- button toggler -->
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navmenu">
                    <div class="navbar-nav">
                        <a href="allproducts.php" class="nav-link">All Products</a>
                        <a href="addproduct.php" class="nav-link">New product</a>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                            <div class="dropdown-menu">
                                <a href="cat.php?id=C001" class="dropdown-item">Children toy</a>
                                <a href="cat.php?id=C002" class="dropdown-item">Learning toy</a>
                            </div>
                        </div>
                    </div>
                    <!-- right -->
                    <div class="navbar-nav ms-auto">
                        <a href="register.php" class="nav-link">Register</a>
                        <a href="login.php" class="nav-link">Login</a>
                        
                    </div>
                </div>
            </div>
</nav>
<section class="py-1 text-center container"
    style="background-image: url('https://scr.vn/wp-content/uploads/2020/07/n%E1%BB%81n-tr%E1%BA%AFng-c%C3%B3-c%C3%A1i-c%C3%A2y-1024x640.jpg'); height: 600px;">