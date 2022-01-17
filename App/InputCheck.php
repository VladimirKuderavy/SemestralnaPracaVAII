<?php

namespace App;

const MAX_STRING_LENGTH = 255;
const FILE_NAME_LENGTH = MAX_STRING_LENGTH - 31;

class InputCheck
{
    public static function checkString($input, &$message, &$message_type)
    {
        if (!is_string($input) || empty($input) || strlen($input) > MAX_STRING_LENGTH) {
            $message = "Invalid input!";
            $message_type = "warning";

            return null;
        }

        return trim(htmlspecialchars(preg_replace('/\s+/', ' ',$input)));
    }

    public static function checkEmail($input, &$message, &$message_type)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL) || empty($input) || strlen($input) > MAX_STRING_LENGTH) {
            $message = "Wrong email input!";
            $message_type = "warning";

            return null;
        }

        return trim(htmlspecialchars($input));
    }

    public static function checkInteger($input, &$message, &$message_type)
    {
        if (!filter_var($input, FILTER_VALIDATE_INT)) {
            $message = "Invalid input!";
            $message_type = "warning";

            return null;
        }

        return $input;
    }

    public static function checkPassword($input, &$message, &$message_type)
    {
        if (!is_string($input) || empty($input) || strlen($input) > MAX_STRING_LENGTH) {
            $message = "Wrong password input!";
            $message_type = "warning";

            return null;
        }

        return $input;
    }

    public static function checkFileName($input, &$message, &$message_type) {
        if (!is_string($input) || empty($input) || strlen($input) > FILE_NAME_LENGTH) {
            $message = "Wrong file name input!";
            $message_type = "warning";

            return null;
        }

        return trim(htmlspecialchars(preg_replace('/\s+/', ' ',$input)));
    }
}