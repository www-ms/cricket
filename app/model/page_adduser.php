<?php

if (isset ($_SESSION["USER"])) {
    if ($_SESSION['USER']['type'] == -1) {
        new Operation('goto', ['']);
    }
}

$fullname = (new Sanitize('name', @$_POST['fullname']))->_;
$username = (new Sanitize('username', @$_POST['username']))->_;
$password = (new Sanitize('password', @$_POST['password']))->_;
$gender = (new Sanitize('radio', @$_POST['gender'], [-1, 1]))->_;

$match = (new Operation('match', ['username' => $username]))->_;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = (new Validate('required', ['r' => ['fullname' => $fullname, 'username' => $username, 'password' => $password, 'gender' => $gender]]))->_;

    if ($error) {
        new Operation('goto', ['adduser', $error]);
    } elseif ($match) {
        new Operation('goto', ['adduser', array_merge($error, ['exists' => $username])]);
    }else {
       $insert = new Operation('inser', ['name' => $fullname, 'username' => $username, 'password' => $password, 'gender' => $gender]);
       new Operation('goto', ['users']);
    }
}

global $error;
global $error_exists;
$error = @$_GET['r'] ?: [];
$error_exists = @$_GET['exists'] ?: [];