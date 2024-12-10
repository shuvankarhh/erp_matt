<?php

namespace App\Services;
use App\Services\Vendor\Tauhid\Time\Time;

class LocalTime
{
    public static function datetime($utc)
    {
        if ($utc != null) {
            return date('m-d-y h:i A', strtotime(Time::local($utc)));
        } else {
            return null;
        }
    }

    public static function date($utc)
    {
        if ($utc != null) {
            return date('m-d-y', strtotime(Time::local($utc)));
        } else {
            return null;
        }
    }

    public static function input($local)
    {
        if ($local != null) {
            $dateObject = \DateTime::createFromFormat('m-d-y h:i A', $local);

            $changedDate = $dateObject->format('Y-m-d H:i:s');

            return Time::utc($changedDate);
        } else {
            return null;
        }
    }

    public static function inputDateOnly($local)
    {
        if ($local != null) {
            $dateObject = \DateTime::createFromFormat('m-d-y', $local);

            $changedDate = $dateObject->format('Y-m-d H:i:s');

            return Time::utc($changedDate);
        } else {
            return null;
        }
    }
}
