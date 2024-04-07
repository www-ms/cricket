<?php
if (isset ($_SESSION["USER"])) {
    if ($_SESSION['USER']['type'] == -1) {
        new Operation('goto', ['users/' . $_SESSION['USER']['username']]);
    } else {
        new Operation('goto', ['users']);
    }
}

$username = (new Sanitize('username', @$_POST['username']))->_;
$password = (new Sanitize('password', @$_POST['password']))->_;

$match = (new Operation('match', ['username' => $username, 'password' => $password]))->_;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $error = (new Validate('required', ['r' => ['username' => $username, 'password' => $password]]))->_;

    if (count($error) > 0) {
        new Operation('goto', ['', $error]);
    }
    if ($match) {
        $_SESSION['USER'] = $match;

        new Operation('goto', ['users/' . $_SESSION['USER']['username']]);
    }
}

global $error;
$error = @$_GET['r'] ?: [];