<?php

define('__ROOT__', getcwd());
define('__HOME__', '/cricket/');

define('__APP__',__ROOT__ . '/app/');
define('__CONTROLLER__', __APP__ . 'controller/');
define('__MODEL__', __APP__ . 'model/');
define('__VIEW__', __ROOT__ . '/view/');

define('__SERVER__', __ROOT__ . '/server/');
define('__ASSETS__', __HOME__.'assets/');
define('__JSON__', __ROOT__.'/config/json');
define('__USER_TABLE__', 'users');
define('__COMPONENTS__', __ROOT__.'/components/');

define('__PAGES__', [
    'login',
    'adduser',
    'signout',
    'fields-users',
]);

define('__ARCHIVES__', [
    'users',
    'matches',
]);