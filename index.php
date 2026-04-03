<?php
require_once 'functions.php';

$banner = loadJsonData('banner.json');
$activePage = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plot Listing</title>

  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>

  <!-- Header -->
  <?php include 'nav.php'; ?>

  <!-- Main Banner -->
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h6><?php echo htmlspecialchars($banner['subtitle']); ?></h6>
            <h2><?php echo htmlspecialchars($banner['title']); ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php renderDomy($banner['domy'] ?? []); ?>

  <!-- Footer -->
  <?php include 'footer.html'; ?>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>