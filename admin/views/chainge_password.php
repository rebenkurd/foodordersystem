<!--Start Main content container-->
<div class="main_content_container">
  <div class="main_container main_menu_open">
    <!--Start system bath-->
    <div class="home_pass hidden-xs">
      <ul>
        <li class="bring_right">
          <span class="glyphicon glyphicon-home"></span>
        </li>
        <li class="bring_right"><a href="">زانیاری بەکارهێنەر</a></li>
        <li class="bring_right">
          <a href="">گۆرینی وشەی تێپەڕ</a>
        </li>
      </ul>
    </div>
    <!--/End system bath-->
    <div class="page_content">
      <h1 class="heading_title">گۆڕینی وشەی تێپەڕ</h1>
      <!--Start status alert-->
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <!--/End status alert-->
      <div class="form">
        <form class="form-horizontal" action="" method="POST">
          <div class="row my-2">
            <label for="input1" class="col-sm-2 form-label"> وشەی تێپەڕ پێشوو</label>
            <div class="col-sm-8">
              <input type="password" name="CurrentPassword" class="form-control" id="input1" placeholder=" وشەی تێپەڕ پیشوو" />
            </div>

          </div>
          <div class="row my-2">
            <label for="input2" class="col-sm-2 form-label"> وشەی تێپەڕ نوێ</label>
            <div class="col-sm-8">
              <input type="password" name="NewPassword" class="form-control" id="input2" placeholder=" وشەی تێپەڕ نوێ بنوسە" />
            </div>
          </div>

          <div class="row my-2">
            <label for="input3" class="col-sm-2 form-label"> وشەی تێپەڕ دڵنیای</label>
            <div class="col-sm-8">
              <input type="password" name="ConfirmPassword" class="form-control" id="input3" placeholder=" وشەی تێپەڕ بنوسەوە بۆ دڵنیابوون" />
            </div>
          </div>

      </div>
      <div class="">
        <div class="text-center">
          <button type="submit" name="Chainge" class="btn btn-success">
            گۆرین
          </button>
          <button type="reset" class="btn btn-danger">
            سڕینەوە
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






<?php
if (isset($_SESSION['username'])) {
  if (isset($_POST['Chainge'])) {
    extract($_POST);
    //1. wargrtnaway data la formaka
    $Id = $_SESSION['id'];
    $CurrentPassword = md5(mysqli_real_escape_string($con, $_POST['CurrentPassword']));
    $NewPassword = md5(mysqli_real_escape_string($con, $_POST['NewPassword']));
    $ConfirmPassword = md5(mysqli_real_escape_string($con, $_POST['ConfirmPassword']));
    if ($CurrentPassword != "" && $NewPassword != "" && $ConfirmPassword != "") {
      if ($NewPassword != $CurrentPassword) {
        if ($NewPassword == $ConfirmPassword) {
          $query = "SELECT * FROM tb_users WHERE password='$CurrentPassword' AND id='$Id'";
          $sql = mysqli_query($con, $query);
          $count = mysqli_num_rows($sql);
          if ($count == 1) {
            //2. nardny datay naw formaka bo databse
            $query1 = "UPDATE tb_users SET password='$NewPassword' WHERE id='$Id'";
            $sql1 = mysqli_query($con, $query1);
            if ($sql1) {
              $_SESSION['SuccessMessage'] = " بە سەرکەوتوی گۆڕا";
              RedirectTo("/food-order-system/admin");
            }
          }
        } else {
          $_SESSION['SuccessMessage'] = "!! بتکایە بە وشەی تێپەڕی نوی و وشەی تێپەڕی دڵنیای با وەک یەک بن  ";
        }
      } else {
        $_SESSION['SuccessMessage'] = "!! بتکاییە با وشەی تێپەڕی کۆن و وشەی تێپەڕی تازە با وەک یەک نەبن ";
      }
    } else {
      $_SESSION['SuccessMessage'] = "!! بتکاییە هەموو بۆشاییەکان پڕبکەرەوە";
    }
  }
}

?>