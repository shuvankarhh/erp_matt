<?php

namespace App\Services\Vendor\Tauhid\Encryption;

use App\Services\Vendor\Tauhid\Encode\Base64urlEncode;

class Encryption
{
    // $key can have any string. Key length should be relevant to the algorithm. Example: 'v&Br#cRd1gdR*gh' (16 characters) for AES-128.
    // $iv will have any string of 16 characters. Example: v&Br#cRd1gdR*gh.
    // You need both $key and $iv used in encryption to get the original string.

    public static function encrypt($string, $key, $iv)
    {
        $encrypted_string = openssl_encrypt($string, 'AES-128-CBC', $key, 0, $iv);

        return Base64urlEncode::encode($encrypted_string);
    }

    public static function decrypt($encrypted_string, $key, $iv)
    {
        $encrypted_string = Base64urlEncode::decode($encrypted_string);
        
        return openssl_decrypt($encrypted_string, 'AES-128-CBC', $key, 0, $iv);
    }
}
