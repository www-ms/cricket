<?php
if (isset ($_SESSION["USER"])) {
    if ($_SESSION['USER']['type'] == -1) {
        new Operation('goto', ['']);
    }
} else {
    new Operation('goto', ['']);
}

global $users;

$users = (new Operation('find'))->_;
