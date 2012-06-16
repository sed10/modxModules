<?php

/**
 * Created by JetBrains PhpStorm.
 * User: LITVAN
 * Date: 06.06.12
 * Time: 22:19
 * To change this template use File | Settings | File Templates.
 */
include_once (__DIR__ . '/helper/autoload.inc.php');

class Controller {

    private $error;
    private $result;
    private $model = 'Locations';
    private $action;

    function __construct() {

        $this->error = false;
        $this->result = false;
        $this->initialize();
    }

    function initialize() {
       
        $this->action=$_POST['action'];
        
        $this->userRequest();
        $view = View\View::getInstance($this->data);
        $view->show();
    }

    function userRequest() {
        $modelName = '\Model\\';
        $modelName = ($_REQUEST['model']) ? $modelName . $_REQUEST['model'] : $modelName . $this->model;
        if (class_exists($modelName)){
            $model = new \Model\Locations(); //$modelName();
            $model->setData($_REQUEST);
            $model->fireActions($this->action);            
            $this->data=$model;                    
        }
        
    }
    
    public function getAction(){
        return $this->action;
    }

}

// class Controller
$controller = new Controller();
?>


