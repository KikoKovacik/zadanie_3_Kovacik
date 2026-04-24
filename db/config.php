<?php

return [
    'qna_data_file' => __DIR__ . '/../qna.json',
    'menus' => [
        'header' => [
            'home' => ['label' => 'Home', 'url' => 'index.php'],
            'category' => ['label' => 'Category', 'url' => 'category.php'],
            'listing' => ['label' => 'Listing', 'url' => 'listing.php'],
            'qna' => ['label' => 'QnA', 'url' => 'qna.php'],
            'contact' => ['label' => 'Contact Us', 'url' => 'contact.php'],
        ],
    ],
    'contact_interests' => [
        ['name' => 'option1', 'value' => 'cars', 'label' => 'Cars'],
        ['name' => 'option2', 'value' => 'apartments', 'label' => 'Apartments'],
        ['name' => 'option3', 'value' => 'shopping', 'label' => 'Shopping'],
        ['name' => 'option4', 'value' => 'food', 'label' => 'Food & Life'],
        ['name' => 'option5', 'value' => 'traveling', 'label' => 'Traveling'],
    ],
];
