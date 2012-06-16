<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

class Locations extends Model{

    public $items;
    private $file;


    function __construct() {
        $this->file = __DIR__ . '/../data/places.json';
        $content = file_get_contents($this->file);
        $this->items = json_decode($content);
        if ($action) {
            $actionName = $action . 'Action';
            $this->$actionName();
        }
        //var_dump(json_decode($content));
    }

    

    protected function saveSectionAction() {
        
        $sectionName=$this->incomingData['sectionName'];
        $itemId=$this->incomingData['itemId'];
        
        foreach ($this->items->$sectionName->items[$itemId] as $key => $value) {
            $this->items->$sectionName->items[$itemId]->$key=$this->incomingData[$key];
        }
        file_put_contents($this->file, json_encode($this->items));
        
        //die(var_dump($this->items->$sectionName->items[$itemId]));
    }

}

?>
