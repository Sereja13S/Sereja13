<?php
namespace util;
class View {
    private $storage = [];
    function __get($name) {
        
        if (isset($this->storage[$name])) {
            return $this->storage[$name];
        }
        return '';
    }
    
    function __set($name, $value) {
        $this->storage[$name] = $value;
    }
}
