<?php

spl_autoload_register(function ($class) {
    if (file_exists("config/$class.php")) {
        require "config/$class.php";
    }
});


$URL = explode("/", preg_replace("/^\/cricket\/|\/$|\?.*/","", trim($_SERVER["REQUEST_URI"])));

$ROUTES = new Route($URL);