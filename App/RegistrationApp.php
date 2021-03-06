<?php

namespace App;

use App\Models\User;

class RegistrationApp
{

    public static function insertUser($email, $username, $password, &$message, &$message_type)
    {
        $email = InputCheck::checkEmail($email, $message, $message_type);
        $username = InputCheck::checkString($username, $message, $message_type);
        $password = InputCheck::checkPassword($password, $message, $message_type);

        if ($email != null && $username != null && $password != null) {

            if (self::checkUserUniqueness($email, $username, $message, $message_type)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $new_user = New User($email, $username, $hashed_password);
                $new_user->save();

                $message = "Registration was successful!";
                $message_type = "success";

                return true;
            }
        }

        return false;
    }

    private static function checkUserUniqueness($email, $username, &$message, &$message_type) {
        $users = User::getAll("email=?", [$email]);
        if (count($users) > 0) {
            $message = "User with specified email already exists! Please enter another email and try again.";
            $message_type = "warning";
            return false;
        }

        $users = User::getAll("username=?", [$username]);
        if (count($users) > 0) {
            $message = "User with specified username already exists! Please enter another username and try again.";
            $message_type = "warning";
            return false;
        }

        return true;
    }
}