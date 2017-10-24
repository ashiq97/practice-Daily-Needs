<?php
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerfull.php';
include 'includes/leftbar.php';
// for getting products from database
$sql_product = "SELECT * FROM products WHERE featured = 1 ";
$featured = $db->query($sql_product);
 ?>
  <!-- main content -->
  <div class="col-md-8">
    <div class="row">
      <h2 class="text-center">Feature products</h2>
      <?php while($product_result = mysqli_fetch_assoc($featured)):  ?>
        <div class="col-sm-3 text-center">


          <h4><?=$product_result['title']; ?></h4>
          <img src="<?= $product_result['image']; ?>" alt="<?= $product_result['title'];?> "class="img-thumb">
          <p class="list-price text-danger">List Price: <s>$<?= $product_result['list_price'];?></s></p>
          <p class="price">Our Price: $<?= $product_result['price'];?></p>
          <!-- <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#details-1">
          Detials</button> -->
          <button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?=$product_result['id'];?>)">Detials</button>

        </div>
      <?php endwhile; ?>
    </div>
 </div>

<?php

include 'includes/rightbar.php';
include 'includes/footer.php';

 ?>
