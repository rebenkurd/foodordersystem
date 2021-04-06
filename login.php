<?php
require('config/constants.php');
require('config/functions.php');
?>

<?php

if (isset($_POST['login'])) {
  //wargrtnaway data la login form
  $Username = $_POST['Username'];
  $Password = md5($_POST['Password']);
  // $Username=mysqli_real_escape_string($con,$Username);
  // $Username=mysqli_real_escape_string($con,$Password);
  //garan la data basda bo away bzanin aw nrxana haya 
  $query = "SELECT * FROM tb_users WHERE username='$Username' AND password='$Password'";
  $sql = mysqli_query($con, $query);
  $count = mysqli_num_rows($sql);
  if ($count > 0) {
    while ($rows = mysqli_fetch_array($sql)) {
      $Id = $rows['id'];
      $FullName = $rows['full_name'];
      $Username1 = $rows['username'];
      $Password1 = $rows['password'];
      $Recycle = $rows['recycle'];
      $TypeId = $rows['type_id'];
      setcookie("user", $Username1, time() + 31556926, '/');
      setcookie("pass", $Password1, time() + 31556926, '/');
    }
    if ($Username != $Username1 && $Password != $Password1) {
      $_SESSION['ErrorMessage'] = "تکایە نازناوەکەت یان وشەی تێپەڕەکەت بە دروستی بنوسە";
      RedirectTo("login.php");
    } elseif ($Recycle != '0') {
      $_SESSION['ErrorMessage'] = "ببوەرە ئەم هەژمارە بلۆک کراوە بۆ ماوەیەک تکایە بۆ زانیاری زیاتر پەیوەندی بە بەڕێوبەرەوە بکە";
      RedirectTo("login.php");
    } elseif ($Username == $Username1 && $Password == $Password1 && $Recycle == '0') {
      $_SESSION['id'] = $Id;
      $_SESSION['full_name'] = $FullName;
      $_SESSION['username'] = $Username1;
      $_SESSION['password'] = $Password1;
      $_SESSION['type_id'] = $TypeId;
      $_SESSION['SuccessMessage'] = ' بەخێربێیت ( ' . $_SESSION['full_name'] . ' ) ';
      RedirectTo("/food-order-system/admin");
    } else {
      RedirectTo("login.php");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>چونەژورەوە</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>

<body>
  <div class="container">
    <div class="img">
      <img src="images/login-bg-img.svg">
    </div>
    <div class="login-content">
      <form action="" method="POST">
        <img src="images/profile-avatar.svg">
        <h2 class="title">بەخێربێیت</h2>
        <?php
        echo SuccessMessage();
        echo ErrorMessage();
        ?>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>نازناو</h5>
            <input type="text" name="Username" id="username" class="input">
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>

          <div class="div">
            <h5>ووشەی تێپەڕ</h5>
            <input type="password" name="Password" id="password" class="input">
            <div class="show">
              <i class="fas fa-eye"></i>
            </div>
          </div>
        </div>
        <div class="div">
          <input type="checkbox" name="Remember" id="remember-me">
          <label for="remember-me">با دانەخرێتەوە</label>
        </div>
        <button type="submit" name="login" disabled class="btn">چوونەژوورەوە</button>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>