<?php
/**
 * Application Routes Configuration
 */

return [
    'home' => [
        'controller' => 'HomeController',
        'title' => 'Home',
        'nav_name' => 'Home'
    ],
    'news' => [
        'controller' => 'NewsController', 
        'title' => 'News',
        'nav_name' => 'News'
    ],
    'rating' => [
        'controller' => 'RatingController',
        'title' => 'Player Rating', 
        'nav_name' => 'Rating'
    ],
    'download' => [
        'controller' => 'DownloadController',
        'title' => 'Download Game',
        'nav_name' => 'Download'
    ],
    'rules' => [
        'controller' => 'RulesController',
        'title' => 'Server Rules',
        'nav_name' => 'Rules'
    ],
    'cabinet' => [
        'controller' => 'CabinetController',
        'title' => 'Cabinet',
        'nav_name' => 'Cabinet',
        'hide_from_nav' => true
    ]
];
