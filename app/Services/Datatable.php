<?php

namespace App\Services;

class Datatable
{
    private static $number = 1;

    public static function serialNum()
    {
        echo self::$number;

        self::$number++;
    }
}
