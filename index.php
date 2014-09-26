<?php
use controller\FrontController;
function findClass($class) {
    $class = str_replace('\\', '/', $class) . '.php';
    if (file_exists($class)) {
        require_once "$class";
    }
}

spl_autoload_register('findClass');

$fc = new FrontController();
$fc->start();
