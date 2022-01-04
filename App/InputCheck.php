<?php

namespace App;

class InputCheck
{
    public static function checkString($input, &$message, &$message_type)
    {
        if (!is_string($input) || empty($input) || strlen($input) > 255) {
            $message = "Nesprávne zadaný vstup!";
            $message_type = "warning";

            return null;
        }

        return trim(htmlspecialchars(preg_replace('/\s+/', ' ',$input)));
    }

    public static function checkEmail($input, &$message, &$message_type)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL) || empty($input) || strlen($input) > 255) {
            $message = "Nesprávne zadaný email!";
            $message_type = "warning";

            return null;
        }

        return trim(htmlspecialchars($input));
    }

    public static function checkInteger($input, &$message, &$message_type)
    {
        if (!filter_var($input, FILTER_VALIDATE_INT)) {
            $message = "Nesprávne zadaný vstup!";
            $message_type = "warning";

            return null;
        }

        return $input;
    }

    public static function checkPassword($input, &$message, &$message_type)
    {
        if (!is_string($input) || empty($input) || strlen($input) > 255) {
            $message = "Nesprávne zadané heslo!";
            $message_type = "warning";

            return null;
        }

        return $input;
    }
}