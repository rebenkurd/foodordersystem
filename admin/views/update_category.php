<!--Start Main content container-->
<div class="main_content_container">
  <div class="main_container main_menu_open">
    <!--Start system bath-->
    <div class="home_pass hidden-xs">
      <ul>
        <li class="bring_right">
          <span class="glyphicon glyphicon-home"></span>
        </li>
        <li class="bring_right"><a href="">جۆرەکان</a></li>
        <li class="bring_right"><a href="">زیادکردنی جۆر</a></li>
      </ul>
    </div>
    <!--/End system bath-->
    <div class="page_content">
      <h1 class="heading_title">دەستکاریکردنی جۆر</h1>

      <!--Start status alert-->
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <!--/End status alert-->

      <div class="form">
        <?php

        if (isset($_GET['id'])) {
          $Id = $_GET['id'];
        }

        $query = "SELECT * FROM tb_category WHERE id='$Id'";
        $sql = mysqli_query($con, $query);
        $count = mysqli_num_rows($sql);
        if ($count == 1) {
          while ($rows = mysqli_fetch_assoc($sql)) {
            $Title = $rows['title'];
            $Image = $rows['image_name'];
            $Featured = $rows['featured'];
            $Active = $rows['active'];

        ?>

            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="my-2 row">
                <label for="input0" class="col-sm-2 form-label">ناوی جۆر</label>
                <div class="col-sm-8">
                  <input type="text" value="<?php echo htmlentities($Title); ?>" name="Title" class="form-control" id="input0" placeholder="ناوی جۆر" />
                </div>
              </div>
              <div class="my-2 row">
                <label class="col-sm-2 form-label">وێنە دانراو</label>
                <div class="col-sm-8">
                  <?php
                  if ($Image != "") {
                    echo '<img src="../../images/' . $Image . '" class="img-rounded user_thumb" alt="">';
                  } else {
                    echo '<span class="text-danger" >نییە</span>';
                  }
                  ?>
                </div>
              </div>
              <div class="my-2 row">
                <label for="input2" class="col-sm-2 form-label">وێنە</label>
                <div class="col-sm-8">
                  <input type="file" name="ImageName" class="form-control" id="input2" />
                  <input type="hidden" name="CurrentImage" class="form-control" id="input2" value="<?php echo htmlentities($Image); ?>" />
                </div>
              </div>
              <div class="my-2 row">
                <label for="input3" class="col-sm-2 form-label">چالاکە</label>
                <div class="col-sm-8 check">
                  <input <?php if ($Active == 'No') {
                            echo "checked";
                          } ?> type="radio" class="form-check-input" name="Active" value="No" id="input3" />
                  Yes
                  <input <?php if ($Active == 'Yes') {
                            echo "checked";
                          } ?> type="radio" class="form-check-input" id="input3" value="Yes" name="Active" />
                  No
                </div>
              </div>
              <div class="my-2 row">
                <label for="input4" class="col-sm-2 form-label">پێکهاتە</label>
                <div class="col-sm-8 check">
                  <input <?php if ($Featured == 'No') {
                            echo "checked";
                          } ?> type="radio" class="form-check-input" value="No" name="Featured" id="input4" />
                  Yes
                  <input <?php if ($Featured == 'Yes') {
                            echo "checked";
                          } ?> type="radio" class="form-check-input" id="input4" value="Yes" name="Featured" />
                  No
                </div>
              </div>

              <div class="">
                <div class="text-center">
                  <button type="submit" name="UpdateCategory" class="btn btn-success">
                    زیادکردن
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
          RedirectTo("manage_categories.php?source=view_all_categories");
        }

        if (isset($_POST['UpdateCategory'])) {
          //wargrtnaway nrx la category form
          $Title = $_POST['Title'];
          $DateTime = date('H:M:S d/m/y');
          $CurrentImage = $_POST['CurrentImage'];
          if (isset($_FILES['ImageName']['name'])) {

            $ImageName = $_FILES['ImageName']['name'];


            if ($ImageName != "") {
              //danany extention bo image
              $ext = end(explode('.', $ImageName));

              //goriny nawy image
              $ImageName = "Food_Category_" . rand(000, 999) . '.' . $ext;
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

          if (isset($_POST['Featured'])) {
            $Feature = $_POST['Featured'];
          } else {
            $Feature = 'No';
          }

          if (isset($_POST['Active'])) {
            $Active = $_POST['Active'];
          } else {
            $Active = 'No';
          }

          $query = "UPDATE tb_category SET title='$Title',image_name='$ImageName',featured='$Feature',active='$Active',date_time=now() WHERE id='$Id'";
          $sql = mysqli_query($con, $query);

          if ($sql) {
            $_SESSION['SuccessMessage'] = 'بە سەرکەوتوی نوێکرایەوە';
            RedirectTo("manage_categories.php?source=view_all_categories");
          } else {
            $_SESSION['ErrorMessage'] = 'تکایە دوبارە هەوڵبدەوە';
            RedirectTo("manage_categories.php?source=update_category&id=" . $Id);
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