<?php include('includes/header.php'); ?>


<!--Start Main content container-->
<div class="main_content_container">
  <div class="main_container main_menu_open">
    <!--Start system bath-->
    <div class="home_pass hidden-xs">
      <ul>
        <li class="bring_right">
          <span class="fas fa-home"></span>
        </li>
        <li class="bring_right">
          <a href="">بەشی سەرەکی</a>
        </li>
      </ul>
    </div>
    <!--/End system bath-->
    <div class="page_content">
      <!--Start status alert-->
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <!--/End status alert-->
      <?php
      if (isset($_SESSION['username'])) {
        $TypeId = $_SESSION['type_id'];
      }
      $query = "SELECT * FROM user_type WHERE id='$TypeId'";
      $sql = mysqli_query($con, $query);
      while ($rows = mysqli_fetch_array($sql)) {
        $Id = $rows['id'];
      }
      if ($Id == '1') {
      ?>
        <div class="quick_links text-center">
          <h1 class="heading_title">ڕێگای خێرا</h1>
          <a href="manage_users.php?source=add_new_user" style="background-color: #c0392b">
            <h4> زیادکردنی بەکارهێنەر</h4>
          </a>
          <a href="manage_foods.php?source=add_new_food" style="background-color: #2980b9">
            <h4>زیادکردنی خواردن</h4>
          </a>
          <a href="manage_categories.php?source=add_new_category" style="background-color: #8e44ad">
            <h4>زیادکردنی جۆرەکان</h4>
          </a>
          <a href="manage_orders.php?source=view_all_orders&page=1" style="background-color: #2c3e50">
            <h4>داواکارییەکان</h4>
          </a>
        </div>
      <?php } ?>

      <div class="home_statics text-center">
        <h1 class="heading_title">زانیاری سایتی گشتی</h1>

        <div style="background-color:#f39c12">
          <span class="bring_right fas fa-eye"></span>

          <h4>ڕێژەی سەردانیکەر</h4>
          <p class="h4"><?php echo TotalVisitors(); ?></p>
        </div>

        <div style="background-color: #9b59b6">
          <span class="bring_right fas fa-utensils"></span>

          <h4>ڕێژەی خواردنەکان</h4>

          <p class="h4"><?php echo TotalFoods(); ?></p>
        </div>

        <div style="background-color: #34495e">
          <span class="bring_right fas fa-th"></span>
          <h4>ڕێژەی جۆرەکان</h4>

          <p class="h4"><?php echo TotalCategories(); ?></p>
        </div>
        <div style="background-color: #00adbc">
          <span class="bring_right fas fa-shopping-cart"></span>
          <h4>ڕێژەی داواکاریەکان</h4>

          <p class="h4"><?php echo TotalOrders(); ?></p>
        </div>
        <div style="background-color: #2e80cc">
          <span class="bring_right fas fa-hand-holding-usd"></span>
          <h4>کۆی گشتی داهات</h4>

          <p class="h4">

            IQD <?php
                if (TotalRevenue() > 0) {
                  echo TotalRevenue();
                } else
                  echo "0.00"
                ?></p>
        </div>
        <div style="background-color: #2ecc85">
          <span class="bring_right fas fa-user-shield"></span>
          <h4>ڕێژەی بەڕێوبەر</h4>

          <p class="h4"><?php echo TotalAdmins(); ?></p>
        </div>
        <div style="background-color: #cc2e55">
          <span class="bring_right fas fa-user"></span>

          <h4>ڕێژەی کاشیرەکان</h4>

          <p class="h4"><?php echo TotalCashers(); ?></p>
        </div>
      </div>
      <!--/End system bath-->
      <div class="page_content">
        <!--Start status alert-->
        <?php
        echo SuccessMessage();
        echo ErrorMessage();
        ?>
        <!--/End status alert-->
        <div class="wrap">
          <div class="card ">
            <div class="card-header">
              <h1 class="heading_title my-0 border-0">داواکاری نوێ</h1>
            </div>
            <div class="card-content ">
              <table>
                <thead>
                  <tr>
                    <th>ژمارە</th>
                    <th>خواردن</th>
                    <th>نرخ</th>
                    <th>چەندانە</th>
                    <th>کۆی گشتی </th>
                    <th>ناو</th>
                    <th>ناونیشان</th>
                    <th>ئیمەڵ</th>
                    <th>مۆبایل</th>
                    <th>بەرواری وەرگرتن</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($_GET["page"])) {
                    $Page = $_GET["page"];

                    if ($Page == 1 || $Page < 1) {
                      $ShowPage = 0;
                    } else {
                      $ShowPage = ($Page * 5) - 5;
                    }
                    $query = "SELECT * FROM tb_order WHERE status='confirm' LIMIT $ShowPage,5";
                    $sql = mysqli_query($con, $query);
                  } else {
                    $query = "SELECT * FROM tb_order WHERE status='confirm'";
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
                      $DateTime = $rows['order_date'];

                  ?>
                      <tr>
                        <td><?php echo htmlentities($SrNo++); ?></td>
                        <td title="<?php echo htmlentities($Food); ?>"><?php echo htmlentities($Food); ?></td>
                        <td title="<?php echo htmlentities($Price); ?>"> IQD <?php echo htmlentities($Price); ?></td>
                        <td title="<?php echo htmlentities($Qty); ?>"><?php echo htmlentities($Qty); ?></td>
                        <td title="<?php echo htmlentities($Total); ?>"> IQD <?php echo htmlentities($Total); ?></td>
                        <td title="<?php echo htmlentities($FullName); ?>"><?php echo htmlentities($FullName); ?></td>
                        <td title="<?php echo htmlentities($Address); ?>">
                          <?php
                          if (strlen($Address) > 20) {
                            $Address = substr($Address, 0, 18) . '..';
                          };
                          echo htmlentities($Address);
                          ?>
                        </td>
                        <td title="<?php echo htmlentities($Email); ?>">
                          <?php echo htmlentities($Email); ?>
                        </td>
                        <td title="<?php echo htmlentities($Contact); ?>"><?php echo htmlentities($Contact); ?></td>
                        <td title="<?php echo htmlentities($DateTime); ?>"><?php echo htmlentities($DateTime); ?></td>
                      </tr>
                  <?php }
                  } else {
                    echo '<td colspan="13" class="text-danger">هیچ داواکرییەکمان نییە</td>';
                  }
                  ?>
                  <tr class="notfound">
                    <td colspan="13" class="text-danger">هیچ داتایەک نیە بەو ناوە</td>
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
            $query = "SELECT COUNT(*) FROM tb_order WHERE status='confirm'";
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

<?php include('includes/footer.php'); ?>