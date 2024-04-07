<?php

class Operation
{
    public $_;
    public function __construct($query, $values = [])
    {
        $this->_ = self::{$query}($values);
    }

    public static function match($values)
    {
        $SQL = "SELECT * FROM " . __USER_TABLE__ . " WHERE";

        foreach ($values as $key => $value) {
            $SQL .= " $key = '$value' AND";
        }

        $SQL = preg_replace('/ AND$/', '', $SQL);

        $RESULT = mysqli_query(__CONN__, $SQL);

        return mysqli_fetch_array($RESULT, MYSQLI_ASSOC);
    }

    public static function find($values)
    {
        $SQL = "SELECT * FROM " . __USER_TABLE__;


        $RESULT = mysqli_query(__CONN__, $SQL);

        return mysqli_fetch_all($RESULT, MYSQLI_ASSOC);
    }

    public static function inser($values)
    {
        $SQL = "INSERT INTO " . __USER_TABLE__ . " (";

        foreach ($values as $key => $value) {
            $SQL .= "$key, ";
        }

        $SQL = preg_replace('/, $/', '', $SQL) . ") VALUES (";

        foreach ($values as $key => $value) {
            $SQL .= "'$value', ";
        }

        $SQL = preg_replace('/, $/', '', $SQL) . ")";

        $RESULT = mysqli_query(__CONN__, $SQL);

        return $RESULT;
    }

    public static function goto($to)
    {
        $Q = isset ($to[1]) ? '?' . http_build_query($to[1]) : '';
        header('Location: ' . __HOME__ . $to[0] . $Q);
    }
}

function is_page()
{
    return ($_GET['path']);
}