<?php include('includes/header.php'); ?>

<?php
global $con;
if (isset($_GET['id'])) {
  $Id = $_GET['id'];
}

if (isset($_POST['Submit'])) {

  $Food = $_POST['Food'];
  $Price = $_POST['Price'];
  $Qty = $_POST['Qty'];
  $Total = $Qty * $Price;
  $FullName = $_POST['FullName'];
  $Address = $_POST['Address'];
  $Contact = $_POST['Contact'];
  $Email = $_POST['Email'];
  $Status = 'confirm';
  $Date = date('H:M:S d/m/y');

  $query = "INSERT INTO tb_order(food,price,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address) 
        VALUES('$Food','$Price','$Qty','$Total',now(),'$Status','$FullName','$Contact','$Email','$Address')";
  $sql = mysqli_query($con, $query);
  if ($sql) {
    RedirectTo("../food-order-system");
  } else {
    RedirectTo("order.php?id=" . $Id);
    $_SESSION['ErrorMessage'] = 'تکایە دوبارە هەوڵبدەوە';
  }
}

?>

<!-- Main Start -->
<main>
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data" class="row p-4 mt-5 form shadow">
      <?php
      echo SuccessMessage();
      echo ErrorMessage();
      ?>
      <fieldset class="text-right my-5 col-md-12 col-lg-6">
        <h3 class="text-right mb-4 text-primary">خۆراکی دیاریکراو</h3>
        <?php

        $query = "SELECT * FROM tb_food WHERE id='$Id'";
        $sql = mysqli_query($con, $query);
        $count = mysqli_num_rows($sql);
        if ($count == 1) {
          while ($rows = mysqli_fetch_assoc($sql)) {
            $Id = $rows['id'];
            $Title = $rows['title'];
            $Image = $rows['image_name'];
            $Price = $rows['price'];


        ?>
            <div class="food-menu-img">
              <?php

              if ($Image == "") {
                echo '<h2 class="text-center text-danger">هیچ وینەیەکی نییە</h2>';
              } else {
                echo '<img src="images/' . $Image . '" alt="" class="img-responsive img-cruve" />';
              }
              ?>
            </div>

            <div class="food-menu-desc">
              <h4 class="">
                <?php echo htmlentities($Title); ?>
                <input type="hidden" name="Food" value="<?php echo htmlentities($Title); ?>">
              </h4>

              <p class="food-price">
                <?php echo htmlentities($Price); ?>
                <input type="hidden" name="Price" value="<?php echo htmlentities($Price); ?>">
              </p>
          <?php }
        } else {
          RedirectTo('../food-order-system');
        } ?>
          <div class="order-label">چەند دانە</div>
          <input type="number" name="Qty" class="text-center form-control input-responsive" value="1" max="10" min="1" required />
            </div>
      </fieldset>
      <fieldset class="text-right my-5 col-md-12 col-lg-6">
        <h3 class="text-right mb-4">وردەکاری ناردن</h3>
        <div class="form-group">
          <label for="full-name">ناوی تەواو</label>
          <input type="text" class="form-control" require placeholder="ناوی تەواو" name="FullName" id="full-name">
        </div>
        <div class="form-group">
          <label for="contact">ژمارەی مۆبایل</label>
          <input type="text" class="form-control" require placeholder="ژمارەی مۆبایل" name="Contact" id="contact">
        </div>
        <div class="form-group">
          <label for="email">ئیمەڵ</label>
          <input type="email" class="form-control" require placeholder="ئیمەڵ" name="Email" id="email">
        </div>
        <div class="form-group">
          <label for="address">ناونیشان</label>
          <textarea name="Address" id="address" require class="form-control"></textarea>
        </div>
        <div class="form-group text-center">
          <button type="submit" name="Submit" class="btn btn-send">ناردن</button>
        </div>
      </fieldset>
    </form>
    <div class="clearfix"></div>
  </div>
</main>
<!-- Main End -->
<?php include('includes/footer.php'); ?>