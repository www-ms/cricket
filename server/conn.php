<?php

$HOST = 'localhost';
$USER = 'root';
$PASS = '';
$DBAS = 'cricket';

$CONN = mysqli_connect($HOST, $USER, $PASS, $DBAS);

define('__CONN__',$CONN);

if (!$CONN) {   
    die('Connection Error: '.mysqli_connect_error());
}

