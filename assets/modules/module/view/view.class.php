<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author LITVAN
 */

namespace View;

abstract class View {

    private $blocks;

    abstract function show();

    public static $items = array();

    public function __construct() {
        $this->addCSS('/assets/modules/module/css/reset.css');
        $this->addCSS('/assets/modules/module/css/module.css');
    }

    public static function getInstance($data) {
        $class_name = 'View\\' . \Helper\Helper::getClassName(get_class($data));
        self::$items = $data->getData();
        return new $class_name($data);
    }

    /**
     * returns template. needs echo.
     * @param type $name
     * @return type 
     */
    public function getTmpl($name = '') {

        $name = ($name) ? $name : strtolower(\Helper\Helper::getClassName(get_class($this)));
        $filename = __DIR__ . strtolower('/tmpl/' . $name . '.tmpl.php');
        $filename = str_replace('\\', '/', $filename);

        if (file_exists($filename)) {
            ob_start();
            include $filename;
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        return $filename . ' lost';
    }

    public function getBlock($blockName) {
        $content = '';
        if (gettype($this->blocks->$blockName) == 'array') {
            foreach ($this->blocks->$blockName as $key => $value) {
                $content.= $value;
            }
        }

        return $content;
    }

    public function addToBlock($blockName,$info) {
        if (!$this->blocks->$blockName) $this->blocks->$blockName=array();
        array_push($this->blocks->$blockName, $info);
        
    }
    
    public function addCSS($src) {
        $this->blocks->styles[]='<link href="'.$src.'?'.time().'" type=text/css rel=stylesheet>';
    }

    public function addScript($src) {
        $this->blocks->scripts[] = '<script type="text/javascript" src="' . $src .'?'.time().'"></script>';
    }

}

?>
