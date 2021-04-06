<?php include('includes/header.php'); ?>

<?php

if (isset($_GET['source'])) {
    $Source = $_GET['source'];
}
switch ($Source) {

    case 'chainge_password':
        include('views/chainge_password.php');
        break;

    case 'setting':
        include('views/setting.php');
        break;


    default:
        RedirectTo("error_404.php");
        break;
}



?>


<?php include('includes/footer.php'); ?>
