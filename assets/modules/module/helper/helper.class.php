<?

namespace Helper;

class Helper{


    function __construct(){
        echo get_class($this);
    }
    
    public static function getClassName($name){
        
        $name=  explode('\\', $name);
        
        return $name[count($name)-1];
    }
    
    public static function genFormElem($attributes=''){
        $element='';
        $attributes=(isset($attributes))?$attributes: new \stdClass();
        $attributes->type=(isset($attributes->type))?$attributes->type:'text';
        
        switch ($attributes->type) {
            case 'textarea':
                  $element.='<textarea name="'.$attributes->name.'" >'.$attributes->value.'</textarea>';
                break;
            case 'select':
                  $element.='<textarea>'.$attributes->value.'</textarea>';
                break;

            default:
                $element.='<input';
                foreach ($attributes as $key => $value) {
                    $element.=' '.$key.'="'.$value.'"';
                }
                $element.='/>';
                break;
            
            
        }
        
        
        return $element;
    }
}