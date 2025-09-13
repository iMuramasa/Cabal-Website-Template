<?php
/**
 * Home Page Controller - Displays main page with server stats and latest news
 */

require_once __DIR__ . '/BaseController.php';

class HomeController extends BaseController {
    
    public function index() {
        $stats = $this->loadData('stats');
        $allNews = $this->loadData('news');
        $latestNews = array_slice($allNews, 0, 3);
        $this->render('home', [
            'stats' => $stats,
            'latestNews' => $latestNews
        ]);
    }
}
