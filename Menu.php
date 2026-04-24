<?php

namespace App\Core;

class Menu extends Database
{
    /**
     * @return array<string, array{label: string, url: string}>
     */
    public function getMenuData(string $type): array
    {
        $menus = $this->getConfig('menus', []);
        if (!is_array($menus) || !isset($menus[$type]) || !is_array($menus[$type])) {
            return [];
        }

        return $menus[$type];
    }

    /**
     * @param array<string, array{label: string, url: string}> $menuData
     */
    public function printMenu(array $menuData, string $activePage = 'home'): void
    {
        foreach ($menuData as $key => $item) {
            if (!isset($item['label'], $item['url'])) {
                continue;
            }

            $activeClass = $key === $activePage ? ' class="active"' : '';
            echo '<li><a href="' . htmlspecialchars($item['url']) . '"' . $activeClass . '>'
                . htmlspecialchars($item['label']) . '</a></li>';
        }

        echo '<li><div class="main-white-button"><a href="#"><i class="fa fa-plus"></i> Add Your Listing</a></div></li>';
    }
}
