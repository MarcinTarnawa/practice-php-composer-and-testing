<?php

namespace Core;

class Validator {

    public static function stringMin($value, $min = 3)
    {
        return strlen($value) >= $min;
    }

    public static function stringMax($value, $max = INF)
    {
        return strlen($value) <= $max;
    }
     
    public static function numberMin($value, $min = 3)
    {
        return $value >= $min;
    }

    public static function numberMax($value, $max = INF)
    {
        return $value <= $max;
    }

    public static function number($value)
    {
        return is_numeric($value);
    }
    
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    //sanitize
    public static function sanitizeKeys($value)
    {
        $selectedValue = array_keys($value);
        $sanitizedValue = array_map(function($col) {
           return preg_replace('/[^a-zA-Z0-9_]/', '', $col);
        }, $selectedValue);
        $value = implode(', ', $sanitizedValue);

        return $value;
    }
    
    public static function sanitizeValues($value)
    {
        $selectedValue = array_values($value);
        $sanitizedValues = array_map(function($col) {
        return preg_replace('/[^a-zA-Z0-9_ ]/', '', $col);
        }, $selectedValue);

        $value =  implode(', ', $sanitizedValues);
        return $value;
    }

    public static function sanitizeArray(array $data) {
    $sanitizedData = [];
    foreach ($data as $key => $value) {
        $sanitizedKey = preg_replace('/[^a-zA-Z0-9_]/', '', (string)$key);
        $sanitizedValue = htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
        $sanitizedData[$sanitizedKey] = $sanitizedValue;
    }
    return $sanitizedData;
}
}