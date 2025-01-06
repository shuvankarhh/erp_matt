<?php

namespace App\Services;

class randomNumberGenarator
{
    function generateRandom16CharacterString(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($characters, 16)), 0, 16);
    }
}
