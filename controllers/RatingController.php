<?php
/**
 * Rating Page Controller - Displays player and guild rankings
 */

require_once __DIR__ . '/BaseController.php';

class RatingController extends BaseController {
    
    public function index() {
        $rating = $this->loadData('rating');
        $type = $_GET['type'] ?? 'players';
        if (!in_array($type, ['players', 'guilds'])) {
            $type = 'players';
        }
        $this->render('rating', [
            'rating' => $rating,
            'currentType' => $type
        ]);
    }
}
