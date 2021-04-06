<?php include('includes/header.php'); ?>

<?php

    if(isset($_GET['source'])){
        $Source=$_GET['source'];
    }
    switch($Source){
        case 'view_all_foods':
            include('views/view_all_foods.php');
            break;
            
         case 'add_new_food':
            include('views/add_new_food.php');
            break;

         case 'update_food':
            include('views/update_food.php');
            break;

         case 'food_recycling':
            include('views/food_recycling.php');
            break;
        default:
        RedirectTo("error_404.php");
        break;
            
    }


?>


<?php include('includes/footer.php'); ?>
