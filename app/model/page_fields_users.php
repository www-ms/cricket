<?php

if (isset($_SESSION["USER"])) {
    if ($_SESSION['USER']['type'] != 1) {
        new Operation('goto', ['']);
    }
}

$fields_data = [];

if (isset($_POST['key']) && count(@$_POST['key'])) {
    for ($i = 1; $i < count($_POST['key']); $i++) {
        $f_name = $_POST['name'][$i];
        $f_key = (new Sanitize('key', $_POST['key'][$i]))->_;
        $f_type = $_POST['type'][$i];
        $f_options = preg_split('/(\r?\n)+/', trim($_POST['options'][$i]));

        $fields_data[] = [
            'name' => $f_name,
            'key' => $f_key,
            'type' => $f_type,
            'options' => $f_options,
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = json_encode($fields_data, JSON_PRETTY_PRINT);

    $file = fopen(__JSON__ . '/fields_user.json', 'w');
    fwrite($file, $jsonData);
    fclose($file);
}

$fullname = (new Sanitize('name', @$_POST['fullname']))->_;