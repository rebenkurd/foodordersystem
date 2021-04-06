<?php

if (isset($_POST['AddFood'])) {
  //wargrtnaway nrx la category form
  $Title = $_POST['Title'];
  $Description = $_POST['Description'];
  $Price = $_POST['Price'];
  $CategoryId = $_POST['CategoryId'];
  $AddedBy = $_SESSION['username'];
  $DateTime = date('H:M:S d/m/y');

  if (isset($_FILES['ImageName']['name'])) {

    $ImageName = $_FILES['ImageName']['name'];

    //danany extention bo image
    $ext = end(explode('.', $ImageName));

    //goriny nawy image
    $ImageName = "Food_" . rand(000, 999) . '.' . $ext;
    //nardny image bo database
    $ImageNameTemp = $_FILES['ImageName']['tmp_name'];
    $ImageDestination = "../images/" . $ImageName;
    $UploadImage = move_uploaded_file($ImageNameTemp, $ImageDestination);
    if (!$UploadImage) {
      $_SESSION['ErrorMessage'] = 'وێنەکە داخڵ نەکرا';
      $ImageName = "image_not_have";
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

  $query = "INSERT INTO tb_food SET title='$Title',description='$Description',price='$Price',image_name='$ImageName',category_id='$CategoryId',featured='$Feature',active='$Active',date_time=now(),addedby='$AddedBy'";
  $sql = mysqli_query($con, $query);

  if ($sql) {
    $_SESSION['SuccessMessage'] = 'بە سەرکەوتوی زیادکرا';
    RedirectTo("manage_foods.php?source=add_new_food");
  } else {
    $_SESSION['ErrorMessage'] = 'تکایە دوبارە هەوڵبدەوە';
    RedirectTo("manage_foods.php?source=add_new_food");
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
      <!--/End status alert-->

      <div class="form">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
          <div class="my-2 row">
            <label for="input0" class="col-sm-2 form-label">ناوی خواردن</label>
            <div class="col-sm-8">
              <input type="text" name="Title" class="form-control" id="input0" placeholder="ناوی جۆر" />
            </div>
          </div>
          <div class="row my-2">
            <label for="input1" class="col-sm-2 form-label">باسکردن</label>
            <div class="col-sm-8">
              <textarea name="Description" id="input1" class="form-control" placeholder="باسێکی خواردنەکە بکە"></textarea>
            </div>
          </div>
          <div class="my-2 row">
            <label for="input2" class="col-sm-2 form-label">نرخ</label>
            <div class="col-sm-8">
              <input type="number" name="Price" class="form-control" id="input2" placeholder="نرخی خواردن" />
            </div>
          </div>
          <div class="my-2 row">
            <label for="input3" class="col-sm-2 form-label">وێنە</label>
            <div class="col-sm-8">
              <input type="file" name="ImageName" class="form-control" id="input3" />
            </div>
          </div>
          <div class="my-2 row">
            <label for="input4" class="col-sm-2 form-label">جۆرەکەی</label>
            <div class="col-sm-8">
              <select name="CategoryId" class="form-control" id="input4">
                <?php
                $query = "SELECT * FROM tb_category WHERE active='Yes' AND recycle='0'";
                $sql = mysqli_query($con, $query);
                $count = mysqli_num_rows($sql);
                if ($count > 0) {
                  while ($rows = mysqli_fetch_assoc($sql)) {
                    $Id = $rows['id'];
                    $Title = $rows['title'];
                ?>
                    <option value="<?php echo htmlentities($Id); ?>"><?php echo htmlentities($Title); ?></option>
                <?php }
                } ?>
              </select>
            </div>
          </div>
          <div class="row my-2">
            <label for="input5" class="col-sm-2 form-label">چالاکە</label>
            <div class="check col-sm-8">
              <input type="radio" class="form-check-input" name="Active" value="No" id="input5" />
              Yes
              <input type="radio" class="form-check-input" id="input5" value="Yes" name="Active" />
              No
            </div>
          </div>
          <div class="my-2 row">
            <label for="input6" class="col-sm-2 form-label">پێکهاتە</label>
            <div class="check col-sm-8">
              <input type="radio" class="form-check-input" value="No" name="Featured" id="input6" />
              Yes
              <input type="radio" class="form-check-input" id="input6" value="Yes" name="Featured" />
              No
            </div>
          </div>

          <div class="">
            <div class="text-center">
              <button type="submit" name="AddFood" class="btn btn-success">
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