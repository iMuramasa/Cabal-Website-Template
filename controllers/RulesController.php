<?php
/**
 * Rules Page Controller - Displays server rules and regulations
 */

require_once __DIR__ . '/BaseController.php';

class RulesController extends BaseController {
    
    public function index() {
        $rules = [
            'general' => [
                'title' => 'General Rules',
                'items' => [
                    'Any form of fraud or deception of other players is prohibited',
                    'Do not use third-party programs to gain advantage',
                    'Selling game items for real money is forbidden',
                    'Cannot create characters with offensive names'
                ]
            ],
            'chat' => [
                'title' => 'Chat Rules',
                'items' => [
                    'No profanity or insulting other players',
                    'Do not spam chat with repetitive messages',
                    'Advertising other servers is prohibited',
                    'Trade messages only in trade chat'
                ]
            ],
            'gameplay' => [
                'title' => 'Gameplay Rules',
                'items' => [
                    'Kill stealing is prohibited',
                    'Cannot block mob spawns without reason',
                    'Attempts to hack other players accounts are forbidden',
                    'Cannot exploit game bugs'
                ]
            ]
        ];
        $this->render('rules', [
            'rules' => $rules
        ]);
    }
}
