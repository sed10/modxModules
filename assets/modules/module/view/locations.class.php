<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of locations
 *
 * @author LITVAN
 */

namespace View;

class Locations extends View {
    
    public $types = array('description' => 'textarea');

    public function __construct() {
        parent::__construct();
        $this->items = self::$items;
        global $modx;
    }

    public function show() {
        $this->addScript('/assets/modules/module/js/jquery-1.7.2.min.js'); 
        $this->addScript('/assets/modules/module/js/jquery-ui-1.8.21.custom.min.js'); 
        $this->addScript('/assets/modules/module/js/locations.js');
        $this->addCSS('/assets/modules/module/css/smoothness/jquery-ui-1.8.21.custom.css');


        $this->addToBlock('body', $this->getTmpl());
        echo $this->getTmpl('base');
        
    }

}
?>
