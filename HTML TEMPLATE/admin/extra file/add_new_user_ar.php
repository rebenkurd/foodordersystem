<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/icon.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/ku.css" rel="stylesheet" class="lang_css arabic" />
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
            <img src="img/logo.png" alt="" /> داواکاری خواردن
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
              title="پڕ بە شاشەکە"
            ></span>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12 user_header_area bring_left left_text">
          <a href="index_en.html" class="change_lang bring_left">EN</a>
          <a href="index_ar.html" class="change_lang bring_left">عربي</a>

          <div class="user_info inline-block">
            <img src="img/user.jpg" alt="" class="img-circle" />
            <span class="h4 nomargin user_name">Rebin Rafiq</span>
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

            <h1 class="h3">ڕێبین ڕەفیق</h1>

            <p><a href="">گۆڕینی وشەی تێپەڕ</a></p>

            <p><a href="">چونەدەرەوە</a></p>
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
                  placeholder="گەڕان بکە "
                />
                <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </div>
            </form>

            <ul>
              <li>
                <span class="glyphicon glyphicon-home"></span
                ><a href="index.html">بەشی سەرەکی</a>
              </li>
              <li>
                <span class="glyphicon glyphicon-user"></span>
                <i class="fas fa-food"> </i>

                <a href="">بەکارهێنەرەکان</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="add_new_user.html">زیادکردنی بەکارهێنەری نوێ</a>
                  </li>
                  <li>
                    <a href="view_all_users.html"
                      >بینینی هەموو بەکارهێنەرەکان</a
                    >
                  </li>
                </ul>
              </li>
              <li>
                <span class="glyphicon glyphicon-cutlery"></span
                ><a href="">خواردنەکان</a>
                <ul class="drop_main_menu">
                  <li><a href="add_new_food.html">زیادکردنی خواردنی نوێ</a></li>
                  <li>
                    <a href="view_all_food.html">بینینی هەموو خواردنەکان</a>
                  </li>
                </ul>
              </li>
              <li>
                <span class="glyphicon glyphicon-th"></span>
                <a href="">جۆرەکان</a>
                <ul class="drop_main_menu">
                  <li>
                    <a href="add_new_category.html">زیادکردنی جۆری نوێ</a>
                  </li>
                  <li>
                    <a href="view_all_category.html">بینینی هەموو جۆرەکان</a>
                  </li>
                </ul>
              </li>
              <li>
                <span class="glyphicon glyphicon-shopping-cart"></span>
                <a href="order.html">داواکاریەکان</a>
              </li>
            </ul>
          </div>
        </div>
        <!--/End side bar main menu-->

        <!--Start Main content container-->
        <div class="main_content_container">
          <div class="main_container main_menu_open">
            <!--Start system bath-->
            <div class="home_pass hidden-xs">
              <ul>
                <li class="bring_right">
                  <span class="glyphicon glyphicon-home"></span>
                </li>
                <li class="bring_right"><a href="">إدارة الاعضاء</a></li>
                <li class="bring_right"><a href="">إضافة عضو جديد</a></li>
              </ul>
            </div>
            <!--/End system bath-->
            <div class="page_content">
              <h1 class="heading_title">إضافة عضو جديد</h1>

              <!--Start status alert-->
              <div role="alert" class="alert alert-success">
                <strong>تم الحفظ بنجاح!</strong>
                <a href="add_new_topic.html" class="alert-link">إضغط هنا</a>
                لاضافة موضوع جديد.
              </div>
              <div role="alert" class="alert alert-danger">
                <strong>خطأ!</strong> لم يتم الحفظ.
              </div>
              <!--/End status alert-->

              <div class="form">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label
                      for="input0"
                      class="col-sm-2 control-label bring_right left_text"
                      >اسم العضو</label
                    >
                    <div class="col-sm-10">
                      <input
                        type="text"
                        class="form-control"
                        id="input0"
                        placeholder="اسم العضو"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label
                      for="input2"
                      class="col-sm-2 control-label bring_right left_text"
                      >البريد الالكتروني</label
                    >
                    <div class="col-sm-10">
                      <input
                        type="email"
                        class="form-control"
                        id="input2"
                        placeholder="البريد الالكتروني"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label
                      for="input3"
                      class="col-sm-2 control-label bring_right left_text"
                      >كلمة المرور</label
                    >
                    <div class="col-sm-10">
                      <input
                        type="password"
                        class="form-control"
                        id="input3"
                        placeholder="كلمة المرور"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label
                      for="input4"
                      class="col-sm-2 control-label bring_right left_text"
                      >الصورة الشخصية</label
                    >
                    <div class="col-sm-10">
                      <input
                        type="file"
                        class="form-control"
                        style="height: unset"
                        id="input4"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12 left_text">
                      <button type="submit" class="btn btn-danger">
                        إضافة العضو
                      </button>
                      <button type="reset" class="btn btn-default">
                        مسح الحقول
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--/End Main content container-->
      </div>
      <!--/End body container section-->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
  </body>
</html>
