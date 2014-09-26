<?php
use model\entity\Good;
use model\entity\User;
use model\service\GoodService;
use model\service\UserService;
function findClass($class) {
    $class = str_replace('\\', '/', $class) . '.php';
    if (file_exists($class)) {
        require_once "$class";
    }
}

spl_autoload_register('findClass');

$userService = new UserService();
$goodService = new GoodService();
/*
$user = new User();
$user->setName('Vasia');
$user->setEmail('vasya@mail.com');
$user->setPassword('mypass');

$userService->add($user);
*/
$good = new Good();
$good->setCategory('electronics');
$good->setName('Google Nexus 5 64G');
$good->setPrice(399.99);

$goodService->add($good);

$good = new Good();
$good->setCategory('electronics');
$good->setName('Samsung Galaxy S5');
$good->setPrice(599.99);

$goodService->add($good);