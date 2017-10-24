<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/teacher/core/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql_dmodal = "SELECT * FROM products WHERE id = '$id'";
$dmodal_query = $db->query($sql_dmodal);
$dmodal_result = mysqli_fetch_assoc($dmodal_query);
$brand_id = $dmodal_result['brand'];
$sql_brand = "SELECT brand_name FROM brand WHERE id = '$brand_id'" ;
$brand_query = $db->query($sql_brand);
$brand_result = mysqli_fetch_assoc($brand_query);
$sizeString = $dmodal_result['sizes'];
$size_array = explode(',', $sizeString);
 ?>
<!-- Details Model -->
<?php ob_start(); ?>
<div class="modal fade details-1 " id="details-modal" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
          <button class="close" type="button" name="button" onclick="closeModal()" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times</span>
          </button>
          <h4 class="modal-title text-center"><?=$dmodal_result['title']; ?></h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <div class="center-block">
                  <img src="<?=$dmodal_result['image']; ?>" alt="<?=$dmodal_result['title']; ?>" class="details img-responsive">
                </div>
              </div>
              <div class="col-sm-6">
                <h4>--Details--</h4>
                <p><?=$dmodal_result['description']; ?></p>
                <hr>
                <p>price: $<?=$dmodal_result['price']; ?></p>
                <p>Brand: <?=$brand_result['brand_name']; ?></p>
                <form  action="add_cart.php" method="post">
                    <div class="form-group">
                        <div class="col-xs-4">
                          <label for="quantity">Quantity:</label>
                          <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                          <div class="col-xs-9"></div>
                        <!-- <p>Available: 3</p> -->
                    </div><br><br>
                    <div class="form-group">
                      <label for="size">Size:</label>
                      <select class="form-control" id="size" name="size">
                          <option value=""></option>

                          <?php foreach($size_array as $string) {
                          $string_array = explode(':',$string);
                          $size = $string_array[0];
                          $quantity = $string_array[1];
                          echo '<option value="'.$size.'">'.$size.' ('.$quantity.' Available)</option>';
                        } ?>


                      </select>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" onclick="closeModal()">Close</button>
        <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"> AddToCart </span></button>
      </div>
  </div>
 </div>
</div>

<script>
function closeModal(){
  jQuery('#details-modal').modal('hide');
  setTimeout(function(){
    jQuery('#details-modal').remove();
    jQuery('.modal-backdrop').remove();
  },500);
}
</script>
<?php echo ob_get_clean(); ?>
