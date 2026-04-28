<?php

if (! function_exists('cords')) {
    function cords($string)
    {
        // check if base64
        if (base64_encode(base64_decode($string, true)) === $string) {
            $string = base64_decode($string);
        }

        $pattern = '/coords="([^"]*)"/';
        if (preg_match($pattern, $string, $matches)) {
            return trim($matches[1]); // found coords, trimmed
        }

        return null; // or '' if you prefer
    }
}
