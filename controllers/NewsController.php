<?php
/**
 * News Page Controller - Displays news list and individual news articles
 */

require_once __DIR__ . '/BaseController.php';

class NewsController extends BaseController {
    
    public function index() {
        $news = $this->loadData('news');
        $selectedNewsId = $_GET['id'] ?? null;
        $selectedNews = null;
        
        if ($selectedNewsId) {
            foreach ($news as $item) {
                if ($item['id'] == $selectedNewsId) {
                    $selectedNews = $item;
                    break;
                }
            }
        }
        $this->render('news', [
            'news' => $news,
            'selectedNews' => $selectedNews
        ]);
    }
}
