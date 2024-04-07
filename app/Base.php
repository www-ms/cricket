<?php
namespace App;

use Exception;

class Base
{
    public function view($view)
    {
        $method = (new Exception())->getTrace()[1];
        $class = strtolower($method['class']);
        $function = $method['function'];

        if (file_exists(__MODEL__ . $class."_$function.php")) {
            require_once __MODEL__ . $class."_$function.php";
        }

        require __VIEW__ . $view . '.php';
    }
}