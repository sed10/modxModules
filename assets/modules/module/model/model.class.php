<?php


namespace Model;


class Model {
    
    protected $incomingData;

    function __construct() {
        
    }
    
    public function getData() {
        return $this->items;
    }

    public function fireActions($action = '') {
        if ($action) {
            $actionName = $action . 'Action';
            if (function_exists($this->$actionName())) {
                $this->$actionName();
            }
        }
    }
    
    public function setData($incomingData) {
        $this->incomingData=$incomingData;
    }

}