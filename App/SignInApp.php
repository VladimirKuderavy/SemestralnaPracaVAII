<?php

namespace App;

class SignInApp
{

    public static function confirmUser($email, $password)
    {
        $email = InputCheck::checkEmail($email);
        $password = InputCheck::checkPassword($password);

        if ($email != null && $password != null) {

            $user = \App\Models\User::getAll("email=?", [$email]);

            if (count($user)) {
                if (password_verify($password, $user[0]->getPassword())) {

                    $_SESSION['user'] = $user[0]->getUsername();
                    $_SESSION['message'] = "Login was successful!";
                    $_SESSION['msg_type'] = "success";

                    return true;
                    //header("Location: ../php/index.php");

                    //exit();
                } else {
                    $_SESSION['message'] = "Wrong password!";
                    $_SESSION['msg_type'] = "warning";
                }
            } else {
                $_SESSION['message'] = "Wrong email!";
                $_SESSION['msg_type'] = "warning";
            }
        }

        return false;
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    public static function logoutUser()
    {
        if (self::isUserLoggedIn()) {
            unset($_SESSION['user']);

            $_SESSION['message'] = 'You have been successfully logged out!';
            $_SESSION['msg_type'] = 'success';

            //session_destroy();

        }
    }
}