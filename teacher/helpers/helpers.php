<?php
function display_errors($errors){
  $display = '<ul class="bg-danger">';
  foreach ($errors as $error) {
    # code...
    $display .= '<li class="text-danger">'.$error.'</li>';
  }
  $display .= '</ul>';
  return $display;
}
function sanitize($dirty)
{
  return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}

function money($number)
{
  return '৳ '.number_format($number,2);
}
function get_category($child_id){
  global $db;
  $id = sanitize($child_id);
  $sql = "SELECT p.id AS 'pid', p.category AS 'parent', c.id AS 'cid', c.category AS 'child'
          FROM categories c
          INNER JOIN categories p
          ON c.parent = p.id
          WHERE c.id ='$id'";

  $query_sql = $db->query($sql);
  $category  = mysqli_fetch_assoc($query_sql);
  return $category;
}
