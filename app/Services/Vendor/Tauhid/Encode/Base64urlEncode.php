<?php

namespace App\Services\Vendor\Tauhid\Encode;

class Base64urlEncode
{
    public static function encode($str)
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }
    public static function decode($str)
    {
        return base64_decode(str_pad(strtr($str, '-_', '+/'), strlen($str) % 4, '=', STR_PAD_RIGHT));
    }
}
