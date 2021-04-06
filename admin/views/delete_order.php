
<?php
include('../../config/constants.php');
include('../../config/functions.php');
global $con;
//bangy id akaynawa ba $_GET
if(isset($_GET['id'])){
  $Id=$_GET['id'];

  $query="DELETE FROM tb_order WHERE id='$Id'";
  $sql=mysqli_query($con,$query);
  if($sql){
      $_SESSION["SuccessMessage"]='بە سەرکەوتوی سڕایەوە';
      RedirectTo("../manage_orders.php?source=order_confirm");
  }
}



?>