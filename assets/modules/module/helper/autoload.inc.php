<?

function __autoload($class_name) {


    $class_name = str_replace('\\', '/', $class_name);


    $filename = strtolower($class_name) . '.class.php';


    $file = __DIR__ . '/../' . $filename;



    if (file_exists($file) == false) {
        echo '<br>' . $file . '</br>';
        return false;
    }


    include ($file);
}