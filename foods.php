<?php include('includes/header.php'); ?>

<!-- Masthead -->
<header class="masthead text-white text-center">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <h1 class="mb-5">بەخیربێیت بۆ ماڵپەڕەکامان</h1>
      </div>
      <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <form action="food-search.php" method="post">
          <div class="form-row">
            <div class="col-12 col-md-9 mb-2 mb-md-0">
              <input type="search" name="Search" class="form-control form-control-lg" placeholder="گەڕان بکە بۆ خواردنەکەت ..." />
            </div>
            <div class="col-12 col-md-3">
              <button type="submit" class="btn btn-block btn-lg btn-outline-light">
                گەڕان
              </button>
            </div>
          </div>
        </form>
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
      <h4>لیستی خواردنەکان</h4>
    </div>


    <div class="d-flex justify-content-start flex-wrap">
      <?php

      global $con;
      $query = "SELECT * FROM tb_food WHERE active='Yes' AND recycle='0' ORDER BY id DESC";
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
                <?php
                if ($Description != "" && !empty($Description)) {
                  echo htmlentities($Description);
                } else {
                  echo "هیچ باسکردنێکی نیە";
                }
                ?>
              </p>
              <br />
              <a href="order.php?id=<?php echo htmlentities($Id); ?>" class="btn btn-primary">ئێستا داوای بکە</a>
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