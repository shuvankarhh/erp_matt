<?php

namespace App\Services\Vendor\Tauhid\Validation;

use Illuminate\Support\Facades\Validator;

use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class Validation
{
    public static function validate($request, $rules, $messages, $customAttributes)
    {
        $validator = Validator::make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails())
        {
            $errors = $validator->messages()->toArray();

            ErrorMessage::validation_push($errors);

            // foreach ($errors as $specific_error)
            // {
            //     foreach ($specific_error as $error)
            //     {
            //         echo $error."<br>";
            //     }
            // }
        }
    }
}
