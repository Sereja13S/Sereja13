<?php
namespace controller;

use util\Request;
use util\View;
class FrontController {
    private $view;
    function start() {
        \util\MySQL::$db = new \PDO('mysql:host=localhost;dbname=simplemvc', 'simplemvc', 'mypassword');
        $this->view = new View();
        session_start();
        $r = new Request();
        $ctrlName = $r->getGetValue('ctrl');
        if (empty($ctrlName)) {
            $ctrlName = 'good';
        }
        switch ($ctrlName) {
            case 'user':
                $ctrl = new UserController($this->view);
                break;
            case 'good':
                $ctrl = new GoodsController($this->view);
                break;
            default:
                http_response_code(404);
        }
        $action = $r->getGetValue('act');
        if (empty($action)) {
            $action = 'index';
        }
        $view = $ctrl->{"{$action}Action"}();
        include "view/$ctrlName/$view.php";
    }
}
