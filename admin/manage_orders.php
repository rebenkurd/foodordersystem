<?php include('includes/header.php'); ?>

<?php

    if(isset($_GET['source'])){
        $Source=$_GET['source'];
    }
    switch($Source){
        
        case 'view_all_orders':
           include('views/orders.php');
           break;

        case 'order_confirm':
            include('views/order_confirm.php');
           break;

        default:
        RedirectTo("error_404.php");
        break;
            
    }


?>


<?php include('includes/footer.php'); ?>
