<?php include('includes/header.php'); ?>

<?php

    if(isset($_GET['source'])){
        $Source=$_GET['source'];
    }
    switch($Source){
        case 'view_all_categories':
            include('views/view_all_categories.php');
            break;
            
         case 'add_new_category':
            include('views/add_new_category.php');
            break;
            
         case 'update_category':
            include('views/update_category.php');
            break;

         case 'category_recycling':
            include('views/category_recycling.php');
            break;

        default:
        RedirectTo("error_404.php");
        break;
            
    }


?>


<?php include('includes/footer.php'); ?>
