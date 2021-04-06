<?php require('../config/constants.php'); ?>
<?php require('../config/functions.php'); ?>
<?php
ConfirmLogin();
Visitors();
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
  if (isset($_SESSION['username'])) {
    $Username = $_SESSION['username'];
  }

  $query = "SELECT * FROM system_setting";
  $sql = mysqli_query($con, $query);
  while ($rows = mysqli_fetch_assoc($sql)) {
    $Title = $rows['title'];
    $Icon = $rows['icon_img'];
  ?>
    <title><?php echo htmlentities($Title); ?></title>
    <link rel="shortcut icon" href="../images/<?php echo $Icon; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5 --->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>

  <div class="container-flued">
    <!--Start header-->
    <div class="row header_section">
      <div class=" col-sm-4 col-lg-12 col-xs-4 logo_area bring_right">
        <h5 class="inline-block">
          <?php echo htmlentities($Title); ?>
        </h5>
      <?php } ?>
      <span class="fas fa-bars bring_left open_close_menu" data-toggle="tooltip" data-placement="right"></span>
      </div>
      <div class="col-sm-4 col-xs-12 head_buttons_area bring_right hidden-xs">
        <div class="inline-block messages bring_right">
          <?php
          if (TotalNewOrders() > 0) {
          ?>
            <span class="fas fa-bell user_info" style="border-radius: 0;" data-toggle="tooltip" data-placement="left" title="داواکاری تازەت بۆ هاتووە">
              <span class="notifications"><?php echo TotalNewOrders(); ?></span>
            </span>
          <?php
          } else {
          ?>
            <span class="fas fa-bell user_info" style="border-radius: 0;" data-toggle="tooltip" data-placement="left" title="هیچ داواکارییەکی تازەت بۆ هاتووە">
              <span class="notifications">0</span>
            </span>
          <?php } ?>

        </div>

        <div class="inline-block full_screen bring_right hidden-xs">
          <span class="fas fa-expand" data-toggle="tooltip" data-placement="left" title="پڕ بە شاشەکە"></span>
        </div>

        <div class="theme-mode">
          <input type="checkbox" onclick="switchTheme()">
        </div>
      </div>
      <div class="col-sm-4 col-xs-12 user_header_area bring_left left_text">
        <?php
        if (isset($_SESSION['username'])) {
          $Username = $_SESSION['username'];
          $query = "SELECT * FROM tb_users WHERE username='$Username'";
          $sql = mysqli_query($con, $query);
          while ($rows = mysqli_fetch_assoc($sql)) {
            $FullName = $rows['full_name'];
            $Image = $rows['image_name'];
        ?>
            <div class="user_info inline-block">
              <img src="../images/<?php echo htmlentities($Image); ?>" alt="" class="img-circle" />
              <span class="h4 nomargin user_name"><?php echo htmlentities($FullName); ?></span>
              <span class="fas fa-cog"></span>
            </div>
        <?php  }
        } ?>

      </div>
    </div>
    <!--/End header-->

    <!--Start body container section-->
    <div class="row container_section">
      <!--Start left sidebar-->
      <div class="user_details close_user_details bring_left">

        <?php
        if (isset($_SESSION['username'])) {
          $Username = $_SESSION['username'];
          $query = "SELECT * FROM tb_users WHERE username='$Username'";
          $sql = mysqli_query($con, $query);
          while ($rows = mysqli_fetch_assoc($sql)) {
            $FullName = $rows['full_name'];
            $Image = $rows['image_name'];
        ?>
            <div class="user_area">
              <img class="img-thumbnail img-rounded bring_right" src="../images/<?php echo htmlentities($Image); ?>" />

              <h1 class="h3"><?php echo htmlentities($FullName); ?></h1>
              <p><a href="user_info.php?source=chainge_password">گۆڕینی وشەی تێپەڕ</a></p>
              <p><a href="views/logout.php">چونەدەرەوە</a></p>
            </div>
        <?php }
        } ?>
        <div class="new_orders">
          <h3>داواکاری نوێ</h3>
          <?php
          $query = "SELECT * FROM tb_order WHERE status='confirm'";
          $sql = mysqli_query($con, $query);
          $count = mysqli_num_rows($sql);
          if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($sql)) {
              $FullNameCustomer = $rows['customer_name'];
              $DateTimeSend = $rows['order_date'];
              $TitleFood = $rows['food'];

          ?>
              <a href="manage_orders.php?source=view_all_orders">
                <div class="order_body">
                  <img src="../images/email.png" class=" bring_right" alt="">
                  <p><?php echo htmlentities($TitleFood); ?></p>
                  <p><?php echo htmlentities($FullNameCustomer); ?> - <?php echo htmlentities($DateTimeSend); ?></p>
                </div>
              </a>
            <?php }
          } else {  ?>
            <h6 class="text-center text-warning">هیچ داواکارییەکی تازەت بۆ نەهاتووە</h6>
          <?php } ?>
        </div>
      </div>
      <!--/End left sidebar-->

      <!--Start Side bar main menu-->
      <div class="main_sidebar bring_right">
        <div class="main_sidebar_wrapper">
          <br>
          <br>

          <ul>
            <?php
            if (isset($_SESSION['username'])) {
              $TypeId = $_SESSION['type_id'];
            }
            $query = "SELECT * FROM user_type WHERE id='$TypeId'";
            $sql = mysqli_query($con, $query);
            while ($rows = mysqli_fetch_array($sql)) {
              $Id = $rows['id'];
            }
            if ($Id == '1') {
            ?>
              <li>
                <span class="fas fa-home" style="padding: 16px;"></span><a href="/food-order-system/admin">بەشی سەرەکی</a>
              </li>

              <li>
                <span class="fas fa-users"></span>
                <a href="">بەکارهێنەرەکان</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="manage_users.php?source=view_all_admins&page=1">پێشاندانی هەموو بەڕێوبەرەکان</a>
                  </li>
                  <li>
                    <a href="manage_users.php?source=view_all_users&page=1">پێشاندانی هەموو کاشێرەکان</a>
                  </li>
                  <li>
                    <a href="manage_users.php?source=add_new_user">زیادکردنی بەکارهێنەری نوێ</a>
                  </li>
                  <li>
                    <a href="manage_users.php?source=user_recycling&page=1">بەکارهێنانەوە</a>
                  </li>
                </ul>
              </li>
              <li>
                <span class="fas fa-utensils" style="padding: 19px;"></span><a href="">خواردنەکان</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="manage_foods.php?source=view_all_foods&page=1">پێشاندانی هەموو خواردنەکان</a>
                  </li>
                  <li><a href="manage_foods.php?source=add_new_food">زیادکردنی خواردنی نوێ</a></li>
                  <li>
                    <a href="manage_foods.php?source=food_recycling">بەکارهێنانەوە</a>
                  </li>
                </ul>
              </li>
              <li>
                <span class="fas fa-th" style="padding: 17px;"></span>
                <a href="">جۆرەکان</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="manage_categories.php?source=view_all_categories&page=1">پێشاندانی هەموو جۆرەکان</a>
                  </li>
                  <li>
                    <a href="manage_categories.php?source=add_new_category">زیادکردنی جۆری نوێ</a>
                  </li>
                  <li>
                    <a href="manage_categories.php?source=category_recycling&page=1">بەکارهێنانەوە</a>
                  </li>
                </ul>
              </li>
              <li>
                <span class="fas fa-shopping-cart" style="padding: 16px;"></span>
                <a href="">داواکاریەکان</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="manage_orders.php?source=view_all_orders&page=1">پێشاندانی هەموو داواکریەکان</a>
                  </li>
                  <li>
                    <a href="manage_orders.php?source=order_confirm&page=1">وەرگیراوەکان</a>
                  </li>
                </ul>
              </li>
              <li>
                <span class="fas fa-cog" style="padding: 17px;"></span>
                <a href="user_info.php?source=setting">چاکسازی</a>
              </li>
            <?php
            } else {
            ?>
              <li>
                <span class="fas fa-home" style="padding: 16px;"></span><a href="/food-order-system/admin">بەشی سەرەکی</a>
              </li>
              <li>
                <span class="fas fa-shopping-cart" style="padding: 16px;"></span>
                <a href="">داواکاریەکان</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="manage_orders.php?source=view_all_orders&page=1">پێشاندانی هەموو داواکریەکان</a>
                  </li>
                  <li>
                    <a href="manage_orders.php?source=order_confirm&page=1">وەرگیراوەکان</a>
                  </li>
                </ul>
              </li>
            <?php }   ?>
          </ul>
        </div>
      </div>
      <!--/End side bar main menu-->