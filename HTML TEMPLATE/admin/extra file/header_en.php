<?php require('../config/constants.php');?>
<?php require('../config/functions.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/icon.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/en.css" rel="stylesheet" class="lang_css english" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <!--Start header-->
      <div class="row header_section">
        <div class="col-sm-3 col-xs-12 logo_area bring_right">
          <h1 class="inline-block">
            <img src="img/logo.png" alt="" />Adminy admin panel
          </h1>
          <span
            class="glyphicon glyphicon-align-justify bring_left open_close_menu"
            data-toggle="tooltip"
            data-placement="right"
            title="Tooltip on left"
          ></span>
        </div>
        <div class="col-sm-3 col-xs-12 head_buttons_area bring_right hidden-xs">
          <div class="inline-block full_screen bring_right hidden-xs">
            <span
              class="glyphicon glyphicon-fullscreen"
              data-toggle="tooltip"
              data-placement="left"
              title="fullscreen"
            ></span>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12 user_header_area bring_left left_text">
          <a href="index_ar.php" class="change_lang bring_left">عربي</a>
          <a href="/food-order-system/admin" class="change_lang bring_left">کوردی</a>

          <div class="user_info inline-block">
            <img src="img/user.jpg" alt="" class="img-circle" />
            <span class="h4 nomargin user_name">Hosam Zewain</span>
            <span class="glyphicon glyphicon-cog"></span>
          </div>
        </div>
      </div>
      <!--/End header-->

      <!--Start body container section-->
      <div class="row container_section">
        <!--Start left sidebar-->
        <div class="user_details close_user_details bring_left">
          <div class="user_area">
            <img
              class="img-thumbnail img-rounded bring_right"
              src="img/user.jpg"
            />

            <h1 class="h3">Hosam Gamal Zewain</h1>

            <p><a href="">Change password</a></p>

            <p><a href="">Logout</a></p>
          </div>
        </div>
        <!--/End left sidebar-->

        <!--Start Side bar main menu-->
        <div class="main_sidebar bring_right">
          <div class="main_sidebar_wrapper">
            <form class="form-inline search_box text-center">
              <div class="form-group">
                <input
                  type="search"
                  class="form-control"
                  placeholder="Search Word"
                />
                <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </div>
            </form>

            <ul>
              <li>
                <span class="glyphicon glyphicon-home"></span
                ><a href="index_en.html">Dashboard</a>
              </li>
              <li>
                <span class="glyphicon glyphicon-user"></span
                ><a href="">Manage Users</a>
                <ul class="drop_main_menu">
                  <li><a href="add_new_user_en.html">Add New user</a></li>
                  <li><a href="view_all_users_en.html">View all users</a></li>
                </ul>
              </li>
              <li>
                <span class="glyphicon glyphicon-cutlery"></span
                ><a href="">Manage Foods</a>
                <ul class="drop_main_menu">
                  <li><a href="add_new_food_en.html">Add New Food</a></li>
                  <li><a href="view_all_foods_en.html">View All Foods</a></li>
                </ul>
              </li>
              <li>
                <span class="glyphicon glyphicon-th"></span
                ><a href="">Manage Categories</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="add_new_category_en.html">Add New Category</a>
                  </li>
                  <li>
                    <a href="view_all_categories_en.html"
                      >View All Categories</a
                    >
                  </li>
                </ul>
              </li>
              <li>
                <span class="glyphicon glyphicon-shopping-cart"></span
                ><a href="orders_en.html">Orders</a>
              </li>
            </ul>
          </div>
        </div>
        <!--/End side bar main menu-->
