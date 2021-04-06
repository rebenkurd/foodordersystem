<?php include('includes/header.php'); ?>

<?php

    if(isset($_GET['source'])){
        $Source=$_GET['source'];
    }
    switch($Source){
        case 'view_all_users':
            include('views/view_all_users.php');
            break;
            
         case 'add_new_user':
            include('views/add_new_user.php');
            break;
            
         case 'update_user':
            include('views/update_user.php');
            break;

         case 'user_recycling':
            include('views/user_recycling.php');
            break;

         case 'view_all_admins':
            include('views/view_all_admins.php');
            break;

        default:
        RedirectTo("error_404.php");
        break;
            
    }
    


?>


<?php include('includes/footer.php'); ?>
