<?php
/**
 * Base Controller - Common logic for all controllers
 */

class BaseController {
    protected $data = [];
    
    protected function loadData($filename) {
        $path = __DIR__ . "/../data/{$filename}.php";
        return file_exists($path) ? include $path : [];
    }
    
    protected function render($viewFile, $data = []) {
        $this->data = array_merge($this->data, $data);
        extract($this->data);
        
        $viewPath = __DIR__ . "/../pages/{$viewFile}.php";
        if (file_exists($viewPath)) {
            include $viewPath;
        }
    }
    
    protected function setData($key, $value) {
        $this->data[$key] = $value;
    }
    
    protected function getData($key = null) {
        return $key ? ($this->data[$key] ?? null) : $this->data;
    }
}
