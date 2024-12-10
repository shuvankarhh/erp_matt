<?php

namespace App\Services\Vendor\Tauhid\Time;

class Time
{
    // converts UTC to local time
    // accepts any time format
    // Example:
    // echo Time1::utc_to_local(now(), 'Asia/Dhaka');
    // echo Time1::utc_to_local('2021-01-08 13:08:57', 'Asia/Dhaka');
    public static function utc_to_local($utc, $timezone)
    {
        $date_time = new \DateTime($utc, new \DateTimeZone('UTC'));
        $date_time->setTimezone(new \DateTimeZone($timezone));
        return $date_time->format('Y-m-d H:i:s');
    }

    // converts UTC to local time automatically
    public static function local($utc)
    {
        if(session()->has('timezone'))
        {
            return self::utc_to_local($utc, session('timezone'));
        }

        // we are returning UTC in order to avoid error in PHP. Then javascript will set timezone and refresh the page.
        return $utc;
    }

    public static function local_to_utc($local, $timezone)
    {
        $date_time = new \DateTime($local, new \DateTimeZone($timezone));
        $date_time->setTimezone(new \DateTimeZone('UTC'));
        return $date_time->format('Y-m-d H:i:s');
    }

    public static function utc($local)
    {
        if(session()->has('timezone'))
        {
            return self::local_to_utc($local, session('timezone'));
        }

        return $local;
    }
}
