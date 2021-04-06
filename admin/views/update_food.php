<!--Start Main content container-->
<div class="main_content_container">
  <div class="main_container main_menu_open">
    <!--Start system bath-->
    <div class="home_pass hidden-xs">
      <ul>
        <li class="bring_right">
          <span class="glyphicon glyphicon-home"></span>
        </li>
        <li class="bring_right"><a href="">خواردنەکان</a></li>
        <li class="bring_right"><a href="">زیادکردنی خواردن</a></li>
      </ul>
    </div>
    <!--/End system bath-->
    <div class="page_content">
      <h1 class="heading_title">زیادکردنی خواردن</h1>

      <!--Start status alert-->
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <?php

      if (isset($_GET['id'])) {
        $Id = $_GET['id'];
      }


      $query = "SELECT * FROM tb_food WHERE id='$Id'";
      $sql = mysqli_query($con, $query);
      $count = mysqli_num_rows($sql);
      if ($count == 1) {
        while ($rows = mysqli_fetch_assoc($sql)) {
          $Title = $rows['title'];
          $Description = $rows['description'];
          $Price = $rows['price'];
          $Image = $rows['image_name'];
          $CategoryId = $rows['category_id'];
          $Featured = $rows['featured'];
          $Active = $rows['active'];

      ?>
          <!--/End status alert-->
          <div class="form">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="my-2 row">
                <label for="input0" class="col-sm-2 form-label">ناوی خواردن</label>
                <div class="col-sm-8">
                  <input type="text" name="Title" value="<?php echo htmlentities($Title); ?>" class="form-control" id="input0" placeholder="ناوی جۆر" />
                </div>
              </div>
              <div class="my-2 row">
                <label for="input0" class="col-sm-2 form-label">باسکردن</label>
                <div class="col-sm-8">
                  <textarea name="Description" class="form-control" placeholder="باسێکی خواردنەکە بکە">
                      <?php echo htmlentities($Description); ?>
                    </textarea>
                </div>
              </div>
              <div class="my-2 row">
                <label for="input0" class="col-sm-2 form-label">نرخ</label>
                <div class="col-sm-8">
                  <input type="number" value="<?php echo htmlentities($Price); ?>" name="Price" class="form-control" id="input0" placeholder="نرخی خواردن" />
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
                <label for="input2" class="col-sm-2 form-label">وێنە</label>
                <div class="col-sm-8">
                  <input type="file" name="ImageName" class="form-control" id="input2" />
                  <input type="hidden" name="CurrentImage" class="form-control" id="input2" value="<?php echo htmlentities($Image); ?>" />
                </div>
              </div>
              <div class="my-2 row">
                <label for="input3" class="col-sm-2 form-label">جۆرەکەی</label>
                <div class="col-sm-8">
                  <select name="CategoryId" class="form-control" id="input3">
                    <?php
                    $query = "SELECT * FROM tb_category WHERE active='Yes' AND recycle='0'";
                    $sql = mysqli_query($con, $query);
                    $count = mysqli_num_rows($sql);
                    if ($count > 0) {
                      while ($rows = mysqli_fetch_assoc($sql)) {
                        $IdCat = $rows['id'];
                        $TitleCat = $rows['title'];
                    ?>
                        <option value="<?php echo htmlentities($IdCat); ?>"><?php echo htmlentities($TitleCat); ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
              </div>

              <div class="my-2 row">
                <label for="input4" class="col-sm-2 form-label">چالاکە</label>
                <div class="col-sm-8 check">
                  <input type="radio" class="form-check-input" <?php if ($Active == 'No') {
                                                                  echo 'checked';
                                                                } ?> name="Active" value="No" id="input4" />
                  Yes
                  <input type="radio" class="form-check-input" <?php if ($Active == 'Yes') {
                                                                  echo 'checked';
                                                                } ?> id="input4" value="Yes" name="Active" />
                  No
                </div>
              </div>
              <div class="my-2 row">
                <label for=" input5" class="col-sm-2 form-label">پێکهاتە</label>
                <div class="col-sm-8  check">
                  <input type="radio" class="form-check-input" <?php if ($Featured == 'No') {
                                                                  echo 'checked';
                                                                } ?> value="No" name="Featured" id="input5" />
                  Yes
                  <input type="radio" class="form-check-input" <?php if ($Featured == 'Yes') {
                                                                  echo 'checked';
                                                                } ?> id="input5" value="Yes" name="Featured" />
                  No
                </div>
              </div>

              <div class="">
                <div class="text-center">
                  <button type="submit" name="UpdateFood" class="btn btn-success">
                    گۆڕین
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
        RedirectTo("manage_foods.php?source=view_all_foods");
      }

      if (isset($_POST['UpdateFood'])) {
        //wargrtnaway nrx la category form
        $Title = $_POST['Title'];
        $Price = $_POST['Price'];
        $DateTime = date('H:M:S d/m/y');
        $AddedBy = $_SESSION['username'];
        $CategoryId = $_POST['CategoryId'];
        $Description = $_POST['Description'];
        $CurrentImage = $_POST['CurrentImage'];
        if (isset($_FILES['ImageName']['name'])) {

          $ImageName = $_FILES['ImageName']['name'];


          if ($ImageName != "") {
            //danany extention bo image
            $ext = end(explode('.', $ImageName));

            //goriny nawy image
            $ImageName = "Food_" . rand(000, 999) . '.' . $ext;
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

        $query = "UPDATE tb_food SET title='$Title',description='$Description',price='$Price',image_name='$ImageName',category_id='$CategoryId',featured='$Feature',active='$Active',date_time=now() WHERE id='$Id'";
        $sql = mysqli_query($con, $query);

        if ($sql) {
          $_SESSION['SuccessMessage'] = 'بە سەرکەوتوی نوێکرایەوە';
          RedirectTo("manage_foods.php?source=view_all_foods");
        } else {
          $_SESSION['ErrorMessage'] = 'تکایە دوبارە هەوڵبدەوە';
          RedirectTo("manage_foods.php?source=update_food&id=" . $Id);
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