<?php
/**
 * Cabinet Page Controller - User account management and character information
 */

require_once __DIR__ . '/BaseController.php';

class CabinetController extends BaseController {
    
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
        
        $userData = null;
        if ($isLoggedIn) {
            $sessionData = $_SESSION['user_data'] ?? [];
            $userData = [
                'username' => $sessionData['username'] ?? 'Player',
                'email' => $sessionData['email'] ?? 'demo@example.com',
                'registration_date' => $sessionData['registration_date'] ?? '2025-01-15',
                'characters' => [
                    [
                        'name' => 'ShadowHunter',
                        'class' => 'Warrior',
                        'level' => 87
                    ],
                    [
                        'name' => 'MysticMage',
                        'class' => 'Force Blader', 
                        'level' => 65
                    ]
                ]
            ];
        }
        $this->render('cabinet', [
            'isLoggedIn' => $isLoggedIn,
            'userData' => $userData
        ]);
    }
}
