<?php

if (!function_exists('character_limiter')) {
    function character_limiter($str, $n = 100)
    {
        $str = trim(strip_tags($str));
        if (strlen($str) <= $n) {
            return $str;
        }

        $truncated = substr($str, 0, $n);
        $lastSpace = strrpos($truncated, ' ');

        return substr($truncated, 0, $lastSpace) . '&hellip;';
    }
}
