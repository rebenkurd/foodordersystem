<?php include('includes/header.php'); ?>


<!-- Masthead -->
<header class="masthead text-white text-center">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <?php
        if (isset($_GET['category_id'])) {
          $CategoryId = $_GET['category_id'];
        }
        global $con;
        $query1 = "SELECT * FROM tb_category WHERE id='$CategoryId'";
        $sql1 = mysqli_query($con, $query1);
        $count = mysqli_num_rows($sql1);
        if ($count > 0) {
          while ($rows = mysqli_fetch_assoc($sql1)) {
            $Title = $rows['title'];
        ?>
            <h1 class="mb-5">لیستی خواردنەکان لەسەر جۆری (<a href="" class="text-warning"><?php echo htmlentities($Title); ?></a>) </h1>
        <?php }
        } ?>
      </div>
    </div>
  </div>
</header>
<!-- Header End -->
<!-- Main Start -->
<main>
  <div class="container">
    <!-- Menu Food -->
    <div class="text-center banner py-1 rounded my-4">
      <h4>لیستی خواردنەکان </h4>
    </div>
    <div class="d-flex justify-content-start flex-wrap">
      <?php
      $query = "SELECT * FROM tb_food WHERE category_id='$CategoryId'";
      $sql = mysqli_query($con, $query);
      $count = mysqli_num_rows($sql);
      if ($count > 0) {
        while ($rows = mysqli_fetch_assoc($sql)) {
          $Id = $rows['id'];
          $Title = $rows['title'];
          $Price = $rows['price'];
          $Description = $rows['description'];
          $Image = $rows['image_name'];
      ?>
          <div class="food-menu-box shadow">
            <div class="food-menu-img">
              <?php

              if ($Image == "") {
                echo ' <img
              src="images/image_not_have.jpg"
              alt="Pizza"
              class="img-responsive img-cruve"
            />';
              } else {
                echo '<img src="images/' . $Image . '" alt="" class="img-responsive img-cruve" />';
              }
              ?>
            </div>

            <div class="food-menu-desc">
              <h4><?php echo htmlentities($Title); ?></h4>
              <p class="food-price"><?php echo htmlentities($Price); ?> IQD</p>
              <p class="food-detail">
                <?php echo htmlentities($Description); ?>
              </p>
              <br />
              <a href="order.php?id=<?php echo htmlentities($Id); ?>" class="btn btn-order">ئێستا داوای بکە</a>
            </div>
          </div>
      <?php }
      } ?>
    </div>
    <div class="clearfix"></div>
  </div>
</main>
<!-- Main End -->

<?php include('includes/footer.php'); ?>