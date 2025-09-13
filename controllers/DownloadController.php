<?php
/**
 * Download Page Controller - Displays game download information and system requirements
 */

require_once __DIR__ . '/BaseController.php';

class DownloadController extends BaseController {
    
    public function index() {
        $downloadInfo = [
            'client_version' => '1.0.24.2',
            'patch_version' => '1.0.24.2-hotfix-3',
            'size' => '2.8 GB',
            'requirements' => [
                'minimum' => [
                    'OS' => 'Windows 7/8/10/11',
                    'Processor' => 'Intel Core i3 / AMD FX',
                    'RAM' => '2 GB',
                    'DirectX' => '9.0c or higher',
                    'Disk Space' => '4 GB free space'
                ],
                'recommended' => [
                    'OS' => 'Windows 10/11',
                    'Processor' => 'Intel Core i5 / AMD Ryzen 5',
                    'RAM' => '8 GB or more',
                    'DirectX' => '11 or higher',
                    'Disk Space' => '25 GB (SSD recommended)'
                ]
            ]
        ];
        $this->render('download', [
            'downloadInfo' => $downloadInfo
        ]);
    }
}
