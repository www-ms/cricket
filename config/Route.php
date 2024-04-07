<?php
require_once "app/Base.php";

class Route{
    public function __construct($URL){
        if ($URL[0] === '') {
            require __CONTROLLER__."Home.php";
            new Home();
        }else 
        if (in_array($URL[0],__PAGES__)){
            require __CONTROLLER__."Page.php";
            new Page($URL[0]);
        }else
        if (in_array($URL[0],__ARCHIVES__)) {
            require __CONTROLLER__.$URL[0].".php";

            new ($URL[0])(@$URL[1]);
        }else{
            require_once __CONTROLLER__."_404.php";
            new _404();
        }
    }
} 


