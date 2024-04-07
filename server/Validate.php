<?php

class Validate
{
    public $_;

    public function __construct($validate, $params = [])
    {
        $this->_ = self::{$validate}($params);
    }

    public static function required($params)
    {
        $R = [];
        $param = array_keys($params)[0];
        $params = array_values($params)[0];

        foreach ($params as $key => $data) {
            if (!$data) {
                $R[$param][] = $key;
            }
        }

        return $R;
    }

    public static function uniqe($args)
    {
        $U = [];

        $object = $args[0];
        $values = $args[1];


        foreach ($values as $value) {
            $U[] = $object[$value];
        }

        return strtolower(preg_replace('/\s+/', '', join('-', $U)));
    }
}