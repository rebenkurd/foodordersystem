<?php
global $con;
if (isset($_POST['AddUser'])) {

  //1. wargrtnaway data la formaka
  $FullName = $_POST['FullName'];
  $Username = $_POST['Username'];
  $AddedBy = $_SESSION['username'];
  $Type = $_POST['Type'];
  $Date = date('H:M:S d/m/y');
  $Password = $_POST['Password']; // md5 bo encrypt krdny password
  //Encrypte Password
  $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
  $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
  $method = 'aes-256-cbc';
  $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
  $encrypted = base64_encode(openssl_encrypt($Password, $method, $sSalt, OPENSSL_RAW_DATA, $iv));
  $query1 = "SELECT * FROM tb_users WHERE username='$Username'";
  $sql1 = mysqli_query($con, $query1);
  $count = mysqli_num_rows($sql1);
  if ($count > 0) {
    $_SESSION['ErrorMessage'] = 'تکایە نازناوێکی تر بنوسە ';
  } else {

    if (isset($_FILES['ImageName']['name'])) {
      $ImageName = $_FILES['ImageName']['name'];

      //danany extention bo image
      $ext = end(explode('.', $ImageName));

      //goriny nawy image
      $ImageName = "User_Image_" . rand(000, 999) . '.' . $ext;
      //nardny image bo database
      $ImageNameTemp = $_FILES['ImageName']['tmp_name'];
      $ImageDestination = "../images/" . $ImageName;
      $UploadImage = move_uploaded_file($ImageNameTemp, $ImageDestination);
      if (!$UploadImage) {
        $_SESSION['ErrorMessage'] = 'وێنەکە داخڵ نەکرا';
        $ImageName = "avatar.jpg";
      }
    } else {
      $ImageName = "";
    }


    if (empty($FullName) && empty($Username) && empty($Password1)) {
      $_SESSION['ErrorMessage'] = 'تکایە خانەکان پڕبەکرەوە';
    } elseif (empty($FullName)) {
      $_SESSION['ErrorMessage'] = 'تکایە خانەی ناو پڕبەکرەوە';
    } elseif (empty($Username)) {
      $_SESSION['ErrorMessage'] = 'تکایە خانەی نازناو پڕبەکرەوە';
    } elseif (empty($Password)) {
      $_SESSION['ErrorMessage'] = 'تکایە خانەی وشەی تێپەڕ پڕبەکرەوە';
    } elseif ($Password < 4) {
      $_SESSION['ErrorMessage'] = 'تکایە با وشەی تێپەڕ کەمتر نەبێ لە ٤ پیت یان ژمارە';
    } elseif (!empty($FullName) && !empty($Username) && !empty($Password)) {
      //2. nardny datay naw formaka bo databse
      $query = "INSERT INTO tb_users(full_name,username,password,type_id,image_name,date_time,addedby) 
       VALUES('$FullName','$Username','$encrypted','$Type','$ImageName',now(),'$AddedBy')";
      $sql = mysqli_query($con, $query);

      if ($sql) {
        //session anusin bo away ka dataman daxl krd messagekman peshanba w peman blle daxlkra
        $_SESSION['SuccessMessage'] = "بە سەرکەوتوی زیادکرا";
        RedirectTo("manage_users.php?source=add_new_user");
      } else {
        //session anusin bo away ka dataman daxl krd messagekman peshanba w peman blle daxl nakra
        $_SESSION['ErrorMessage'] = "دووبارە هەوڵبدەوە";
        RedirectTo("manage_users.php?source=add_new_user");
      }
    }
  }
}

?>

<!--Start Main content container-->
<div class="main_content_container">
  <div class="main_container main_menu_open">
    <!--Start system bath-->
    <div class="home_pass hidden-xs">
      <ul>
        <li class="bring_right">
          <span class="glyphicon glyphicon-home"></span>
        </li>
        <li class="bring_right"><a href="">بەکارهێنەرەکان</a></li>
        <li class="bring_right">
          <a href=""> زیادکردنی بەکارهێنەر</a>
        </li>
      </ul>
    </div>
    <!--/End system bath-->
    <div class="page_content">
      <h1 class="heading_title">زیادکردنی بەکارهێنەر</h1>
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <!--/End status alert-->

      <div class="form">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
          <div class="my-2 row">
            <label for="input0" class="form-label col-sm-2">ناوی تەواو</label>
            <div class="col-sm-8">
              <input type="text" class="form-control " id="input0" name="FullName" placeholder="ناوی تەواو" />
            </div>
          </div>
          <div class="my-2 row">
            <label for="input2" class="form-label col-sm-2">نازناو</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="input2" name="Username" placeholder="نازناو " />
            </div>
          </div>
          <div class="my-2 row">
            <label for="input5" class="form-label col-sm-2">وێنە</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="input5" name="ImageName" />
            </div>
          </div>
          <div class="my-2 row">
            <label for="input3" class="form-label col-sm-2"> وشەی تێپەڕ</label>
            <div class="col-sm-8">
              <input type="password" name="Password" class="form-control" id="input3" placeholder=" وشەی تێپەڕ" />
            </div>
          </div>

          <div class="my-2 row">
            <label for="input4" class="form-label col-sm-2">جۆری</label>
            <div class="col-sm-8">
              <select name="Type" class="form-control" id="input4">
                <option value="1">
                  بەڕێوبەر
                </option>
                <option value="2">
                  کاشێر
                </option>
              </select>
            </div>
          </div>

      </div>
      <div class="">
        <div class="text-center">
          <button type="submit" name="AddUser" class="btn btn-success">
            زیادکردن
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