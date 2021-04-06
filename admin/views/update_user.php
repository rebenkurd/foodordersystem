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
      <!--Start status alert-->
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <!--/End status alert-->

      <div class="form">


        <?php
        global $con;

        if (isset($_GET['id'])) {
          $Id = $_GET['id'];
        }
        $query = "SELECT * FROM tb_users WHERE id='$Id'";
        $sql = mysqli_query($con, $query);

        $count = mysqli_num_rows($sql);

        if ($count > 0) {
          while ($rows = mysqli_fetch_assoc($sql)) {
            $FullName = $rows['full_name'];
            $Username = $rows['username'];
            $Type = $rows['type_id'];
            $Image = $rows['image_name'];
        ?>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="my-2 row">
                <label for="input0" class="col-sm-2 form-label">ناوی تەواو</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="input0" value="<?php echo htmlentities($FullName); ?>" name="FullName" placeholder="ناوی تەواو" />
                </div>
              </div>
              <div class="my-2 row">
                <label for="input2" class="col-sm-2 form-label">نازناو</label>
                <div class="col-sm-8">
                  <input type="text" value="<?php echo htmlentities($Username); ?>" class="form-control" id="input2" name="Username" placeholder="نازناو " />
                </div>
              </div>
              <div class="my-2 row">
                <label class="col-sm-2 form-label">وێنە دانراو</label>
                <div class="col-sm-8">
                  <?php
                  if ($Image != "") {
                    echo '<img src="../images/' . $Image . '" class="img-rounded user_thumb" alt="">';
                  } else {
                    echo '<span class="text-danger" >نییە</span>';
                  }
                  ?>
                </div>
              </div>
              <div class="my-2 row">
                <label for="input3" class="col-sm-2 form-label">وێنە</label>
                <div class="col-sm-8">
                  <input type="file" name="ImageName" class="form-control" id="input3" />
                  <input type="hidden" name="CurrentImage" class="form-control" id="input3" value="<?php echo htmlentities($Image); ?>" />
                </div>
              </div>
              <div class="my-2 row">
                <label for="input4" class="col-sm-2 form-label">جۆری</label>
                <div class="col-sm-8">
                  <p><?php echo htmlentities($Type); ?></p>
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
          <button type="submit" name="UpdateUser" class="btn btn-success">
            پاشەکەوتکردن
          </button>
          <button type="reset" class="btn btn-danger">
            سڕینەوە
          </button>
        </div>
      </div>
      </form>
  <?php
          }
        } else {
          //session anusin bo away ka dataman daxl krd messagekman peshanba w peman blle daxl nakra
          RedirectTo("manage_users.php?source=view_all_users");
        }


        if (isset($_POST['UpdateUser'])) {
          //1. wargrtnaway data la formaka
          $FullName = $_POST['FullName'];
          $Username = $_POST['Username'];
          $DateTime = date('H:M:S d/m/y');
          $AddedBy = $_SESSION['username'];
          $Type = $_POST['Type'];
          $CurrentImage = $_POST['CurrentImage'];
          if (isset($_FILES['ImageName']['name'])) {

            $ImageName = $_FILES['ImageName']['name'];


            if ($ImageName != "") {
              //danany extention bo image
              $ext = end(explode('.', $ImageName));

              //goriny nawy image
              $ImageName = "User_Image_" . rand(000, 999) . '.' . $ext;
              //nardny image bo database
              $ImageNameTemp = $_FILES['ImageName']['tmp_name'];
              $ImageDestination = "../images/" . $ImageName;
              $UploadImage = move_uploaded_file($ImageNameTemp, $ImageDestination);

              if ($Image != "") {
                $Path = "../images/" . $Image;
                $Remove = unlink($Path);
              }
            } else {
              $ImageName = $CurrentImage;
            }
          } else {
            $ImageName = "";
          }

          //2. nardny datay naw formaka bo databse
          $query = "UPDATE tb_users SET full_name='$FullName',username='$Username',type_id='$Type',image_name='$ImageName',date_time=now(),addedby='$AddedBy' WHERE id='$Id'";
          $sql = mysqli_query($con, $query);
          if ($sql) {
            $_SESSION['SuccessMessage'] = "بە سەرکەوتوی نوێکرایەوە";
            RedirectTo("manage_users.php?source=view_all_admins");
          } else {
            //session anusin bo away ka dataman daxl krd messagekman peshanba w peman blle daxl nakra
            $_SESSION['ErrorMessage'] = "تکایە هەوڵبدەوە";
            RedirectTo("manage_users.php?source=update_user&id=" . $Id);
          }
        }
  ?>
    </div>
  </div>
</div>
</div>
<!--/End Main content container-->
</div>
<!--/End body container section-->
</div>