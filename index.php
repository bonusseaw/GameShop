<?php
// rootPath ใช้กำหนด path ของไฟล์ปัจจุบันเทียบกับ root folder ของระบบ
$rootPath = "./";
require $rootPath . "Classes/Route.class.php";

/**
 * Load Models
 */
spl_autoload_register(function ($class) {
    $path = $GLOBALS['rootPath'].'Model/' . $class . '.class.php';
    if (file_exists($path))
        require_once $path;
});

/**
 * Load Controllers
 */
spl_autoload_register(function ($class) {
    $path = $GLOBALS['rootPath'].'Controller/' . $class . '.class.php';
    if (file_exists($path))
        require_once $path;
});

$router = new Router($rootPath);
$router->load();