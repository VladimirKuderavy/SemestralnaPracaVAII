<?php

namespace App;

class InputCheck
{
    public static function checkString($input)
    {
        if (!is_string($input) || empty($input) || strlen($input) > 255) {
            $_SESSION['message'] = "Invalid input!";
            $_SESSION['msg_type'] = "warning";

            return null;
        }

        return trim(htmlspecialchars(preg_replace('/\s+/', ' ',$input)));
    }

    public static function checkEmail($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL) || empty($input) || strlen($input) > 255) {
            $_SESSION['message'] = "Invalid input!";
            $_SESSION['msg_type'] = "warning";

            return null;
        }

        return trim(htmlspecialchars($input));
    }

    public static function checkInteger($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_INT)) {
            $_SESSION['message'] = "Invalid input!";
            $_SESSION['msg_type'] = "warning";

            return null;
        }

        return $input;
    }

    public static function checkPassword($input)
    {
        if (!is_string($input) || empty($input) || strlen($input) > 255) {
            $_SESSION['message'] = "Invalid input!";
            $_SESSION['msg_type'] = "warning";

            return null;
        }

        return $input;
    }
}