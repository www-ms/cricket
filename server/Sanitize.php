<?php

class Sanitize
{
    public $_;

    public function __construct($type = '', $value = null, $valid = [])
    {
        if (method_exists($this, $type)) {
            $this->_ = self::{$type}($value, $valid);
        }
    }

    public static function text($value, $valid)
    {
        $value = htmlspecialchars(preg_replace('/\s+/', ' ', trim($value)));


        if (count($valid) > 0) {
            if (in_array($value, $valid)) {
                return $value;
            }
        } elseif ($value !== '') {
            return $value;
        }
    }

    public static function name($value, $valid)
    {
        $value = self::text($value, $valid);

        if (preg_match('/^[a-zA-Z ]+$/', $value)) {
            return $value;
        }
    }

    public static function phone($value, $valid)
    {
        $value = self::text($value, $valid);

        if (preg_match('/^[0-9]{10}$/', $value)) {
            return $value;
        }
    }

    public static function email($value, $valid)
    {
        $value = self::text($value, $valid);

        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return $value;
        }
    }

    public static function url($value, $valid)
    {
        $value = self::text($value, $valid);

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }
    }

    public static function username($value, $valid)
    {
        $value = self::text($value, $valid);

        if (preg_match('/^[a-zA-Z0-9]{1}([._]{0,1}[a-zA-Z0-9]){0,15}$/', $value)) {
            return $value;
        }
    }

    public static function password($value, $valid)
    {
        $value = self::text($value, $valid);

        if (preg_match('/^([\w=-_\[\]()@]){8,50}$/', $value)) {
            return $value;
        }
    }
    public static function radio($value, $valid)
    {
        if (in_array($value, $valid)) {
            return $value;
        }
    }

    public static function key($value, $valid)
    {
        $value = self::text($value, $valid);
        $value = preg_replace('/[^a-zA-Z0-9\s]/', '_', $value);
        return preg_replace('/_+/', '_', $value);

    }

}

function _e($field = [])
{
    if ($field[0] and $field[1] and count($field[1]) > 0) {
        echo in_array($field[0], $field[1]) ? 'is-error' : '';
    } else {
        echo '';
    }
}
