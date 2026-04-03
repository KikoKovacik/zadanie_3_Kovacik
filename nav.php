<?php
if (!function_exists('renderNavigation')) {
    require_once 'functions.php';
}

$activePage = $activePage ?? 'home';
?>
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <a href="index.php" class="logo"></a>
          <ul class="nav">
            <?php renderNavigation($activePage); ?>
          </ul>
          <a class='menu-trigger'><span>Menu</span></a>
        </nav>
      </div>
    </div>
  </div>
</header>
