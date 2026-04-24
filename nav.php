<?php
require_once 'Database.php';
require_once 'Menu.php';

use App\Core\Menu;

$activePage = $activePage ?? 'home';
$menuManager = new Menu();
$menuData = [];

if (isset($menuManager->getMenuData('header')['home'])) {
  $menuData = $menuManager->getMenuData('header');
}
?>
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <a href="index.php" class="logo"></a>
          <ul class="nav">
            <?php $menuManager->printMenu($menuData, $activePage); ?>
          </ul>
          <a class='menu-trigger'><span>Menu</span></a>
        </nav>
      </div>
    </div>
  </div>
</header>
