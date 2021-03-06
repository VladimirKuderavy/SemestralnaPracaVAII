<?php

namespace App;

use App\Models\User;

class SignInApp
{

    public static function confirmUser($email, $password, &$message, &$message_type)
    {
        $email = InputCheck::checkEmail($email, $message, $message_type);
        $password = InputCheck::checkPassword($password, $message, $message_type);

        if ($email != null && $password != null) {

            $user = User::getAll("email=?", [$email]);

            if (count($user)) {
                if (password_verify($password, $user[0]->getPassword())) {

                    $_SESSION['user'] = $user[0]->getUsername();
                    $message = "You have been successfully signed in!";
                    $message_type = "success";

                    return true;
                } else {
                    $message = "Wrong password! Try again.";
                    $message_type = "warning";
                }
            } else {
                $message = "Wrong email! Try again.";
                $message_type = "warning";
            }
        }

        return false;
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    public static function getUsername()
    {
        return $_SESSION['user'];
    }

    public static function logoutUser(&$message, &$message_type)
    {
        if (self::isUserLoggedIn()) {
            unset($_SESSION['user']);

            $message = 'You have been successfully signed off!';
            $message_type = 'success';

            session_destroy();
        }
    }
}