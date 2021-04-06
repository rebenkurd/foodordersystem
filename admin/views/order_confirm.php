<!--Start Main content container-->
<div class="main_content_container">
  <div class="main_container main_menu_open">
    <!--Start system bath-->
    <div class="home_pass hidden-xs">
      <ul>
        <li class="bring_right">
          <span class="glyphicon glyphicon-home"></span>
        </li>
        <li class="bring_right"><a href="manage_orders.php?source=view_all_orders&page=1">داواکاریەکان</a></li>
        <li class="bring_right"><a href="manage_orders.php?source=order_confirm&page=1">وەرگیراو</a></li>
      </ul>
    </div>

    <!--/End system bath-->
    <div class="page_content">
      <h1 class="heading_title"> بینینی هەموو وەرگیراوەکان </h1>
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
                <tr>
                  <td>
                    <form action="" method="POST">
                      <input type="checkbox" name="checkall" id="checkall">
                  </td>
                  <th>ژمارە</th>
                  <th>خواردن</th>
                  <th>نرخ</th>
                  <th>چەندانە</th>
                  <th>کۆی گشتی </th>
                  <th>ناو</th>
                  <th>ناونیشان</th>
                  <th>ئیمەڵ</th>
                  <th>مۆبایل</th>
                  <th>دۆخ</th>
                  <th>بەروار وەرگرتن</th>
                  <th>بەروار ناردن</th>
                  <th>کێ ناردی</th>
                  <th>کردارەکان</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <td colspan="16" class="text-center">
                    <button name="recoverall" type="submit" class="btn btn-success">گەراندنەوە هەمووی</button>
                    <button name="deleteall" type="submit" class="btn btn-danger">سرینەوە هەمووی</button>
                  </td>
                </tr>
              </tfoot>
              <tbody>
                <?php
                if (isset($_POST['recoverall'])) {
                  $ConfirmBy = $_SESSION['username'];
                  if (isset($_POST['sel'])) {
                    foreach ($_POST['sel'] as $sel) {
                      $query2 = "UPDATE tb_order SET status='confirm',confirmby='$ConfirmBy' WHERE id='$sel'";
                      $sql2 = mysqli_query($con, $query2);
                    }
                  }
                }

                if (isset($_POST['deleteall'])) {
                  $ConfirmBy = $_SESSION['username'];
                  if (isset($_POST['sel'])) {
                    foreach ($_POST['sel'] as $sel) {
                      $query1 = "DELETE FROM tb_order WHERE id='$sel'";
                      $sql1 = mysqli_query($con, $query1);
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
                  $query = "SELECT * FROM tb_order WHERE status='confirmed' LIMIT $ShowPage,5";
                  $sql = mysqli_query($con, $query);
                } else {
                  $query = "SELECT * FROM tb_order WHERE status='confirmed'";
                  $sql = mysqli_query($con, $query);
                }

                $count = mysqli_num_rows($sql);

                if ($count > 0) {
                  $SrNo = 1;
                  while ($rows = mysqli_fetch_assoc($sql)) {
                    $Id = $rows['id'];
                    $Food = $rows['food'];
                    $Price = $rows['price'];
                    $Qty = $rows['qty'];
                    $Total = $rows['total'];
                    $FullName = $rows['customer_name'];
                    $Address = $rows['customer_address'];
                    $Contact = $rows['customer_contact'];
                    $Email = $rows['customer_email'];
                    $Status = $rows['status'];
                    $OrderDate = $rows['order_date'];
                    $ConfirmDate = $rows['confirm_date'];
                    $ConfirmBy = $rows['confirmby'];
                ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="sel[]" class="checkitem" value="<?php echo $Id; ?>">
                      </td>
                      <td><?php echo htmlentities($SrNo++); ?></td>
                      <td title="<?php echo htmlentities($Food); ?>">
                        <?php
                        if (strlen($Food) > 11) {
                          $Food = substr($Food, 0, 10) . '..';
                        }
                        echo htmlentities($Food);
                        ?></td>
                      <td title="<?php echo htmlentities($Price); ?>"> IQD <?php echo htmlentities($Price); ?></td>
                      <td title="<?php echo htmlentities($Qty); ?>"><?php echo htmlentities($Qty); ?></td>
                      <td title="<?php echo htmlentities($Total); ?>">
                        IQD <?php
                            if (strlen($Price) > 11) {
                              $Price = substr($Price, 0, 10) . '..';
                            }
                            echo htmlentities($Total); ?></td>
                      <td title="<?php echo htmlentities($FullName); ?>">
                        <?php
                        if (strlen($FullName) > 11) {
                          $FullName = substr($FullName, 0, 10) . '..';
                        }
                        echo htmlentities($FullName);
                        ?>
                      </td>
                      <td title="<?php echo htmlentities($Address); ?>">
                        <?php
                        if (strlen($Address) > 11) {
                          $Address = substr($Address, 0, 10) . '..';
                        }
                        echo htmlentities($Address);
                        ?>
                      </td>
                      <td title="<?php echo htmlentities($Email); ?>">
                        <?php
                        if (strlen($Email) > 11) {
                          $Email = substr($Email, 0, 10) . '..';
                        }
                        echo htmlentities($Email); ?>
                      </td>
                      <td title="<?php echo htmlentities($Contact); ?>"><?php echo htmlentities($Contact); ?></td>
                      <td title="<?php echo htmlentities($Status); ?>"><?php echo htmlentities($Status); ?></td>
                      <td title="<?php echo htmlentities($ConfirmDate); ?>">
                        <?php
                        if (strlen($ConfirmDate) > 11) {
                          $ConfirmDate = substr($ConfirmDate, 0, 10) . '..';
                        }
                        echo htmlentities($ConfirmDate); ?>
                      </td>
                      <td title="<?php echo htmlentities($OrderDate); ?>">
                        <?php
                        if (strlen($OrderDate) > 11) {
                          $OrderDate = substr($OrderDate, 0, 10) . '..';
                        }
                        echo htmlentities($OrderDate); ?>
                      </td>
                      <td title="<?php echo htmlentities($ConfirmBy); ?>">
                        <?php
                        if (strlen($ConfirmBy) > 11) {
                          $ConfirmBy = substr($ConfirmBy, 0, 10) . '..';
                        }
                        echo htmlentities($ConfirmBy); ?>
                      </td>
                      
                      <td>
                        <a href="manage_orders.php?source=order_confirm&id=<?php echo $Id; ?>" class="fas fa-recycle " data-toggle="tooltip" data-placement="top" title="وەرگرتنەوە"></a>
                        <a href="views/delete_order.php?id=<?php echo htmlentities($Id); ?>" class="fas fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="سرینەوە "></a>
                      </td>
                    </tr>
                <?php }
                } else {
                  echo '<td colspan="16" class="text-danger text-center">هیچ داواکاریەکی نیردراومان نییە</td>';
                }
                if (isset($_GET['id'])) {
                  $Id = $_GET['id'];
                  $ConfirmBy = $_SESSION['usernem'];
                  $query = "UPDATE tb_order SET status='confirm',confirmby='$ConfirmBy' WHERE id='$Id'";
                  $sql = mysqli_query($con, $query);
                  if ($sql) {
                    $_SESSION["SuccessMessage"] = 'بە سەرکەوتوی گەڕێندرایەوە';
                    RedirectTo("manage_orders.php?source=order_confirm");
                  }
                }

                ?>
                <tr class="notfound">
                  <td colspan="16" class="text-danger">هیچ داتایەک نیە بەو ناوە</td>
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
                <a aria-label="Previous" href="manage_orders.php?source=view_all_orders&page=<?php echo htmlentities($i - 1); ?>"><span aria-hidden="true">»</span></a>
              </li>
          <?php }
          } ?>

          <?php
          global $con;
          $query = "SELECT COUNT(*) FROM tb_order WHERE status='confirmed'";
          $sql = mysqli_query($con, $query);
          $RowPagination = mysqli_fetch_assoc($sql);
          $TotalPost = array_shift($RowPagination);
          $PostPagination = ($TotalPost / 5);
          $PostPagination = ceil($PostPagination);
          for ($i = 1; $i <= $PostPagination; $i++) {
            if (isset($Page)) {
          ?>
              <li><a href="manage_orders.php?source=view_all_orders&page=<?php echo htmlentities($i); ?>"><?php echo htmlentities($i); ?> <span class="sr-only">(current)</span></a></li>
          <?php

            }
          }

          ?>
          <?php
          if (isset($Page) && !empty($Page)) {
            if ($Page + 1 <= $PostPagination) {
          ?>
              <li>
                <a aria-label="Next" href="manage_orders.php?source=view_all_orders&page=<?php echo htmlentities($i + 1); ?>"><span aria-hidden="true">«</span></a>
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