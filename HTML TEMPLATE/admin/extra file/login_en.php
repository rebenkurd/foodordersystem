<!DOCTYPE html>
<!--
/*
    Theme Name: Adminty
    Theme URI: http://www.roqay.com
    Author: Hosam Zewain
    Author URI: http://www.hosamzewain.com
    Description:  Free Admin Panal
    Version: 1.0
*/
-->

<html lang="ar">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/icon.css" rel="stylesheet" />
    <link href="css/en.css" rel="stylesheet" />
    <link id="css" href="css/light_style.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="body">
    <!--Start Login Form-->
    <div class="login_area" style="margin-top: 10%">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-ceneter">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            ></button>
            <h4 class="modal-title">Login Form</h4>
          </div>
          <div id="test" class="modal-body notvis">
            <form method="get" action="/index.html" style="direction: ltr">
              <div class="input-group input-group-lg">
                <input
                  type="text"
                  name="Username"
                  class="form-control"
                  placeholder="Username"
                  aria-describedby="username"
                />
                <span
                  class="input-group-addon glyphicon glyphicon-user"
                  id="username"
                ></span>
              </div>
              <div class="input-group input-group-lg" style="margin-top: 10px">
                <input
                  type="password"
                  class="form-control"
                  name="Password"
                  placeholder="Password"
                  aria-describedby="password"
                />
                <span
                  class="input-group-addon glyphicon glyphicon-lock"
                  id="password"
                ></span>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
    </div>
    <!--End Login From-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--Start Login Area Show Animation-->
    <script type="text/javascript">
      $(document).ready(function () {
        $(".login_area").show(1000);
      });
    </script>
    <!--End Login Area Show Animation-->
  </body>
</html>
