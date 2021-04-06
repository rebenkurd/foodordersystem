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
              <button type="submit" class="btn btn-search btn-block btn-lg">
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
    <!-- Categories -->
    <div class="title text-center banner py-1 rounded my-4">
      <h4> جۆری خواردنەکان </h4>
    </div>
    <div class="row">
      <?php

      global $con;
      $query = "SELECT * FROM tb_category WHERE active='Yes' AND featured='Yes' AND recycle='0' ORDER BY id DESC LIMIT 3";
      $sql = mysqli_query($con, $query);
      $count = mysqli_num_rows($sql);
      if ($count > 0) {
        while ($rows = mysqli_fetch_assoc($sql)) {
          $Id = $rows['id'];
          $Title = $rows['title'];
          $Image = $rows['image_name'];

      ?>
          <a href="category-foods.php?category_id=<?php echo htmlentities($Id); ?>" class="card col-4 px-0  text-white">
            <?php
            if ($Image == "") {
              echo ' <img
              src="images/image_not_have.jpg"
              alt="Pizza"
              class="category-img"
            />';
            } else {
              echo ' <img
              src="images/' . $Image . '"
              alt="Pizza"
              class="category-img"
            />';
            }
            ?>
            <div class="card-img-overlay">
              <h5 class="card-title"> <?php echo htmlentities($Title); ?></h5>
            </div>
          </a>
      <?php
        }
      } else {
        echo ' <h4 class="text-center text-primary">هیچ جۆرێکمان نییە</h4>';
      }
      ?>

    </div>
    <div class="text-center my-5">
      <a href="categories.php">بینینی زیاتر ..</a>
    </div>
    <div class="clearfix"></div>

    <!-- Menu Food -->
    <div class="text-center banner py-1 rounded my-4">
      <h4>لیستی خواردنەکان</h4>
    </div>


    <div class="d-flex justify-content-start flex-wrap">
      <?php

      global $con;
      $query = "SELECT * FROM tb_food WHERE active='Yes' AND featured='Yes' AND recycle='0' ORDER BY id DESC LIMIT 6";
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
            />';              } else {
                echo '<img src="images/' . $Image . '" alt="" class="img-responsive img-cruve" />';
              }
              ?>
            </div>

            <div class="food-menu-desc">
              <h4><?php echo htmlentities($Title); ?></h4>
              <p class="food-price">
                <?php echo htmlentities($Price); ?>
              </p>
              <p class="food-desc">
                <?php
                if ($Description == "" && empty($Description)) {
                  echo "هیچ باسکردنێکی نیە";
                } else {
                  echo htmlentities($Description);
                }
                ?>
              </p>
              <br />
              <a href="order.php?id=<?php echo htmlentities($Id); ?>" class="btn btn-order">ئێستا داوای بکە</a>
            </div>
          </div>
      <?php }
      } ?>

    </div>
    <div class="text-center my-5">
      <a href="foods.php">بینینی زیاتر ..</a>
    </div>
    <div class="clearfix"></div>
  </div>
</main>
<!-- Main End -->

<!-- Food Menu Section Ends Here -->
<?php include('includes/footer.php'); ?>