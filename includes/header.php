<?php include('config/constants.php'); ?>
<?php include('config/functions.php'); ?>
<?php Visitors(); ?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php

  $query = "SELECT * FROM system_setting";
  $sql = mysqli_query($con, $query);
  while ($rows = mysqli_fetch_assoc($sql)) {
    $Title = $rows['title'];
    $Icon = $rows['icon_img'];

  ?>
    <title><?php echo htmlentities($Title); ?></title>
    <link rel="shortcut icon" href="images/<?php echo $Icon; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 4.4 --->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-expand-md">
    <a class="navbar-brand" href="#"><?php echo htmlentities($Title); ?></a>
  <?php } ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/food-order-system"><i class="fas fa-home"></i> دەستپێک </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="foods.php">خواردنەکان</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="categories.php">
          جۆرەکان
        </a>
      </li>
    </ul>
    <div class="theme-mode">
      <input type="checkbox" onclick="switchTheme()">
    </div>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> چونەژوورەوە</a>
      </li>
    </ul>

  </div>
  </nav>