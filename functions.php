<?php

function loadJsonData(string $filePath): array
{
    if (!file_exists($filePath)) {
        return [];
    }

    $content = file_get_contents($filePath);
    if ($content === false) {
        return [];
    }

    $decoded = json_decode($content, true);
    return is_array($decoded) ? $decoded : [];
}

function renderNavigation(string $activePage = 'home'): void
{
    $menuItems = [
        'home' => ['label' => 'Home', 'url' => 'index.php'],
        'category' => ['label' => 'Category', 'url' => 'category.php'],
        'listing' => ['label' => 'Listing', 'url' => 'listing.php'],
        'contact' => ['label' => 'Contact Us', 'url' => 'contact.php'],
    ];

    foreach ($menuItems as $key => $item) {
        $activeClass = $key === $activePage ? ' class="active"' : '';
        echo '<li><a href="' . htmlspecialchars($item['url']) . '"' . $activeClass . '>'
            . htmlspecialchars($item['label']) . '</a></li>';
    }

    echo '<li><div class="main-white-button"><a href="#"><i class="fa fa-plus"></i> Add Your Listing</a></div></li>';
}

function renderDomy(array $domy): void
{
    if (empty($domy)) {
        return;
    }

    echo '<div class="popular-categories">';
    echo '  <div class="container">';
    echo '    <div class="row">';
    echo '      <div class="col-lg-12">';
    echo '        <div class="section-heading">';
    echo '          <h2>Ponuka domov</h2>';
    echo '          <h6>Klikni na obrazok pre detail</h6>';
    echo '        </div>';
    echo '      </div>';

    foreach ($domy as $dom) {
        $title = htmlspecialchars($dom['nazov'] ?? 'Dom');
        $image = htmlspecialchars($dom['obrazok'] ?? 'assets/images/listing-01.jpg');
        $url = htmlspecialchars($dom['url'] ?? '#');

        echo '      <div class="col-lg-4 col-sm-6">';
        echo '        <div class="popular-item">';
        echo '          <div class="thumb">';
        echo '            <a href="' . $url . '"><img src="' . $image . '" alt="' . $title . '"></a>';
        echo '          </div>';
        echo '          <div class="right-content">';
        echo '            <h4><a href="' . $url . '">' . $title . '</a></h4>';
        echo '          </div>';
        echo '        </div>';
        echo '      </div>';
    }

    echo '    </div>';
    echo '  </div>';
    echo '</div>';
}
