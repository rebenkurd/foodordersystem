<?php include('includes/header.php'); ?>

<!-- Masthead -->
<header class="masthead text-white text-center">
  <div class="overlay"></div>
  <div class="container">
    <?php
    $Search = $_POST['Search'];
    ?>
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <h1 class="mb-5">گەڕانەکەت لەسەر خواردنەکەت(<?php echo htmlentities($Search); ?>)</h1>
      </div>
    </div>
  </div>
</header>
<!-- Header End -->
<!-- Main Start -->
<main>
  <div class="container">
    <!-- Menu Food -->
    <div class="text-center bg-primary py-1 text-white rounded my-4">
      <h4>لیستی خواردنە دۆزراوەکان</h4>
    </div>

    <div class="d-flex justify-content-start flex-wrap">
      <?php

      $query = "SELECT * FROM tb_food WHERE active='Yes' AND recycle='1' AND recycle='0' AND title LIKE '%$Search%' OR description LIKE '%$Search%'";
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
          <div class="food-menu-box bg-light">
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
                } ?>
              </p>
              <br />
              <a href="order.php?id=<?php echo htmlentities($Id) ?>" class="btn btn-primary">ئێستا داوای بکە</a>
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