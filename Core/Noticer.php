<?php

namespace Core;

class Noticer
{
    public static function message(string $type, string $text)
    {
        $messages = [
            'success' => 'Success: ',
            'error' => 'Error: ',
            'warning' => 'Warning: ',
        ];

        $prefix = $messages[$type] ?? '';

        return $prefix . htmlspecialchars($text);
    }

    public static function previousUrl()
    {    
        if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
        }
        return null;
    }
}