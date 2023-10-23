<?php
require_once('header.php');
require_once('connect.php');
?>
<section class="py-1 text-center container"
    style="background-image: url('https://scr.vn/wp-content/uploads/2020/07/n%E1%BB%81n-tr%E1%BA%AFng-c%C3%B3-c%C3%A1i-c%C3%A2y-1024x640.jpg'); height: 600px;">
    <div class="row py-lg-1">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Toy Shop</h1>
            <h5>Welcome to our online toy shop. Our shop has a variety of toys that will bring joy and fun to your little ones.</h5>
            <h5>Wish you a pleasant shopping experience!</h5>
            <p class="lead text-muted"></p>
        </div>
    </div>

    <?php

$sql = "SELECT * FROM `product` ORDER BY pdate DESC LIMIT 4";
    $c = new Connect();
    $dblink = $c->connectToMySQL();
    $re = $dblink->query($sql);
    if($re->num_rows>0){
        ?>
        <div class = "container">
            <div class = "row justify-content-center">
        <?php
        while($row=$re->fetch_assoc()){
           ?>


  <div class="col-md-3 py-2">
      <div class="card text-black">
      <img src="./img/<?=$row['pimage']?>"
              class="card-img-top" alt="Toy" />
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
                  Learn more
                </button>
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
    }else{
        echo "Something wrong!!!!";
    }
    ?>
