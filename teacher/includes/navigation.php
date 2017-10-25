<!-- Top Nav Bar -->

<?php
$sql="SELECT * FROM categories WHERE parent = 0";
$pquery = $db->query($sql);
 ?>

<nav class ="navbar navbar-default navbar-fixed-top">
<div  class ="container ">
  <a  href="index.php" class="navbar-brand"> first boutique </a>
  <ul class="nav navbar-nav">
    <?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
      <?php

      $parent_id = $parent['id'] ;

      $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";

      $cquery = $db->query($sql2);

      ?>

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['category']; ?> <span  class ="" </span></a>
        <ul class="dropdown-menu" role="menu">
          <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
          <li><a href="category.php?cat=<?=$child['id'];?>"> <?php echo $child['category']; ?> </a></li>
        <?php endwhile; ?>
       </ul>
   </li>
 <?php endwhile ; ?>

 </div>
</nav>

<script>
$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>
