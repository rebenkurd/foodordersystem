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
        <li class="bring_right"><a href="manage_users.php?source=user_recycling&page=1"> بەکارهینانەوە </a></li>
      </ul>
    </div>
    <!--/End system bath-->
    <div class="page_content">
      <h1 class="heading_title"> بینینی هەموو سڕدراوەکان </h1>
      <!--Start status alert-->
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <!--/End status alert-->
      <div class="wrap">
        <div class="card ">
          <div class="card-header">
            <div class="form-group col-sm-12 col-lg-4">
              <input type="text" class="form-control" id='txt_searchall' placeholder="گەران بکە">
            </div>
          </div>
          <div class="card-content ">
            <table>
              <thead>
                </tr>
                <tr>
                  <td>
                    <form action="" method="POST">
                      <input type="checkbox" name="checkall" id="checkall">
                  </td>
                  <th>ژمارە</th>
                  <th>وێنە</th>
                  <th>نازناو</th>
                  <th>ناوی تەواو</th>
                  <th>دۆخ</th>
                  <th>کێ زیادی کردوە</th>
                  <th>بەروار</th>
                  <th>کردارەکان</th>
                </tr>
              </thead>
              <tfoot>
                <tr>

                  <td colspan="9" class="text-center">
                    <button name="recoverall" type="submit" class="btn btn-success">گەراندنەوە هەمووی</button>
                    <button name="deleteall" type="submit" class="btn btn-danger">سرینەوە هەمووی</button>

                  </td>
                </tr>
              </tfoot>
              <tbody>
                <?php
                if (isset($_POST['recoverall'])) {
                  if (isset($_POST['sel'])) {
                    foreach ($_POST['sel'] as $sel) {
                      $query1 = "UPDATE tb_users SET recycle='0' WHERE id='$sel'";
                      $sql1 = mysqli_query($con, $query1);
                    }
                  }
                }
                if (isset($_POST['deleteall'])) {
                  if (isset($_POST['sel'])) {
                    foreach ($_POST['sel'] as $sel) {
                      $query2 = "DELETE FROM tb_users WHERE id='$sel'";
                      $sql2 = mysqli_query($con, $query2);
                    }
                  }
                }
                if (isset($_GET["page"])) {
                  $Page = $_GET["page"];

                  if ($Page == 1 || $Page < 1) {
                    $ShowPage = 0;
                  } else {
                    $ShowPage = ($Page * 5) - 5;
                  }
                  $query = "SELECT * FROM tb_users WHERE recycle='1' LIMIT $ShowPage,5";
                  $sql = mysqli_query($con, $query);
                } else {
                  $query = "SELECT * FROM tb_users WHERE recycle='1'";
                  $sql = mysqli_query($con, $query);
                }
                $count = mysqli_num_rows($sql);
                if ($count > 0) {
                  $SrNo = 1;
                  while ($rows = mysqli_fetch_assoc($sql)) {
                    $Id = $rows['id'];
                    $FullName = $rows['full_name'];
                    $Username = $rows['username'];
                    $TypeId = $rows['type_id'];
                    $Image = $rows['image_name'];
                    $AddedBy = $rows['addedby'];
                    $DateTime = $rows['date_time'];
                ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="sel[]" class="checkitem" value="<?php echo $Id; ?>">
                      </td>
                      <td><?php echo htmlentities($SrNo++); ?></td>
                      <td>
                        <?php
                        if ($Image != "") {
                          echo '<img src="../images/' . $Image . '" class="img-rounded user_thumb" alt="">';
                        } else {
                          echo '<span class="text-danger" >نییە</span>';
                        }
                        ?>
                      </td>
                      <td title="<?php echo htmlentities($Username); ?>">
                        <?php
                        if (strlen($Username) > 11) {
                          $Username = substr($Username, 0, 10) . '..';
                        }
                        echo htmlentities($Username);
                        ?>
                      </td>
                      <td title="<?php echo htmlentities($FullName); ?>">
                        <?php
                        if (strlen($FullName) > 11) {
                          $FullName = substr($FullName, 0, 10) . '..';
                        }
                        echo htmlentities($FullName); ?>
                      </td>
                      <?php
                      $query = "SELECT * FROM user_type WHERE id='$TypeId'";
                      $sql = mysqli_query($con, $query);
                      while ($rows = mysqli_fetch_assoc($sql)) {
                        $Type = $rows['type'];
                      ?>
                        <td title="<?php echo htmlentities($Type); ?>"><?php echo htmlentities($Type); ?></td>
                      <?php } ?>
                      <td title="<?php echo htmlentities($AddedBy); ?>">
                        <?php
                        if (strlen($AddedBy) > 11) {
                          $AddedBy = substr($AddedBy, 0, 10) . '..';
                        }
                        echo htmlentities($AddedBy);
                        ?>
                      </td>
                      <td title="<?php echo htmlentities($DateTime); ?>">
                        <?php
                        if (strlen($DateTime) > 11) {
                          $DateTime = substr($DateTime, 0, 10) . '..';
                        }
                        echo htmlentities($DateTime);
                        ?>
                      </td>
                      <td>
                        <a href="manage_users.php?source=user_recycling&id=<?php echo htmlentities($Id); ?>" class="fas fa-recycle text-success" data-toggle="tooltip" data-placement="top" title="گەراندنەوە"></a>
                        <a href="views/delete_user.php?id=<?php echo htmlentities($Id); ?>&image_name=<?php echo htmlentities($Image); ?>" class="fas fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="سرینەوەی بە تەواوی"></a>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo '<tr><td colspan="9" class="text-danger text-center" >هیچ بەکارهێنەریکی سڕاوەمان نییە </td></tr>';
                }
                if (isset($_GET['id'])) {
                  $Id = $_GET['id'];

                  $query = "UPDATE tb_users SET recycle='0' WHERE id='$Id'";
                  $sql = mysqli_query($con, $query);
                  if ($sql) {
                    $_SESSION["SuccessMessage"] = 'بە سەرکەوتوی هێنرایەوە';
                    RedirectTo("manage_users.php?source=user_recycling");
                  }
                }
                ?>
                <tr class="notfound">
                  <td colspan="9" class="text-danger">هیچ داتایەک نیە بەو ناوە</td>
                </tr>
              </tbody>

              </form>
            </table>
          </div>
        </div>
      </div>

      <nav class="text-center">
        <ul class="pagination">
          <?php
          if (isset($Page)) {
            if ($Page > 1) {
          ?>
              <li>
                <a aria-label="Previous" href="manage_users.php?source=user_recycling&page=<?php echo htmlentities($i - 1); ?>"><span aria-hidden="true">»</span></a>
              </li>
          <?php }
          } ?>

          <?php
          global $con;
          $query = "SELECT COUNT(*) FROM tb_users WHERE recycle='1'";
          $sql = mysqli_query($con, $query);
          $RowPagination = mysqli_fetch_assoc($sql);
          $TotalPost = array_shift($RowPagination);
          $PostPagination = ($TotalPost / 5);
          $PostPagination = ceil($PostPagination);
          for ($i = 1; $i <= $PostPagination; $i++) {
            if (isset($Page)) {
          ?>
              <li><a href="manage_users.php?source=user_recycling&page=<?php echo htmlentities($i); ?>"><?php echo htmlentities($i); ?> <span class="sr-only">(current)</span></a></li>
          <?php

            }
          }

          ?>
          <?php
          if (isset($Page) && !empty($Page)) {
            if ($Page + 1 <= $PostPagination) {
          ?>
              <li>
                <a aria-label="Next" href="manage_users.php?source=user_recycling&page=<?php echo htmlentities($i + 1); ?>"><span aria-hidden="true">«</span></a>
              </li>
          <?php }
          } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>
<!--/End Main content container-->
</div>
<!--/End body container section-->
</div>