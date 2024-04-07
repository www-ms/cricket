<?php
$user = preg_replace('/^users\//', '', $_GET['path']);

if (!isset ($_SESSION['USER'])) {
    new Operation('goto', []);
    if ($_SESSION['USER']['type'] == -1) {
        if ($_SESSION['USER']['username'] !== $user) {
            new Operation('goto', []);
        }
    }
}

$cuser = (new Operation('match', ['username' => $user]))->_;

// print_r($cuser);
?>

<?php

include __COMPONENTS__ . 'user-heading.php';
include __COMPONENTS__ . 'user-matches.php';

?>