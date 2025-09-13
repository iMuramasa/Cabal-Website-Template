<?php
/**
 * Authentication Handler - Simple login system for demonstration
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'login') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (!empty($username) && !empty($password)) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_data'] = [
                'username' => $username,
                'email' => 'demo@example.com',
                'registration_date' => '2025-01-15'
            ];
            
            echo json_encode([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => '/?page=cabinet'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Please fill in all fields'
            ]);
        }
    } elseif ($action === 'logout') {
        session_destroy();
        echo json_encode([
            'success' => true,
            'message' => 'You have successfully logged out',
            'redirect' => '/?page=home'
        ]);
    }
    exit;
}
