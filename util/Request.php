<?php
namespace util;
class Request {
    function isPost() {
        return !empty($_POST);
    }
    
    function getPostValue($name) {
        return filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
    }
    
    function getGetValue($name) {
        return filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING);
    }
    
    function getCookieValue($name) {
        return filter_input(INPUT_COOKIE, $name, FILTER_SANITIZE_STRING);
    }
    
    function getSessionValue($name) {
        return $_SESSION[$name];
    }
    
    function setSessionValue($name, $value) {
        $_SESSION[$name] = $value;
    }
}
