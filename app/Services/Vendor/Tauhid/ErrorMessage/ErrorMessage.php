<?php

namespace App\Services\Vendor\Tauhid\ErrorMessage;

class ErrorMessage
{
    public static $errors = array();

    public static $has_run_only_once = 0;

    public static function validation_push($input_errors)
    {
        $keys = array_keys( $input_errors );

        foreach($keys as $key)
        {
            if (!isset(self::$errors[$key])) {
                self::$errors[$key] = array();
            }

            foreach($input_errors[$key] as $element)
            {
                array_push(self::$errors[$key], $element);
            }
        }
    }

    public static function specific_validation_push($attribute_name, $input_error)
    {
        if (!isset(self::$errors[$attribute_name])) {
            self::$errors[$attribute_name] = array();
        }

        array_push(self::$errors[$attribute_name], $input_error);
    }

    public static function general_push($input_error)
    {
        if (!isset(self::$errors['general'])) {
            self::$errors['general'] = array();
        }

        array_push(self::$errors['general'], $input_error);
    }

    public static function has_error()
    {
        if(count(self::$errors) > 0)
        {
            return 1;
        } else
        {
            return 0;
        }
    }
}
