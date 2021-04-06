
<?php
include('../../config/constants.php');
include('../../config/functions.php');
global $con;
//bangy id akaynawa ba $_GET
if(isset($_GET['id']) && isset($_GET['image_name'])){
  $Id=$_GET['id'];
  $Image=$_GET['image_name'];
  if($Image!=""){
    $Path="../../images/".$Image;
    $Remove=unlink($Path);
    if(!$Remove){
      $_SESSION['ErrorMessage']='سڕینەوەکە سەرکەوتو نەبوو تکایە دوبارە هەوڵبدەوە';
    }
  }
  $query="DELETE FROM tb_category WHERE id='$Id'";
  $sql=mysqli_query($con,$query);
  if($sql){
      $_SESSION["SuccessMessage"]='بە سەرکەوتوی سڕایەوە';
      RedirectTo("../manage_categories.php?source=category_recycling");
  }
}



?>