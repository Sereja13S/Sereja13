<?php
namespace controller;

use util\Request;
class BaseController {
    private $request;
    protected $view;
    
    function __construct($view) {
        $this->view = $view;
    }
    
     /**
     * 
     * @return Request
     */
    protected function getRequest() {
        if (empty($this->request)) {
            $this->request = new Request();
        }
        return $this->request;
    }
    
    protected function redirect($where) {
        header("location: $where.php");
    }
}
