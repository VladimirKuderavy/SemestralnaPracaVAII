<?php

namespace App;

use App\Models\User;

class RegistrationApp
{

    public static function insertUser($email, $username, $password)
    {
        $email = InputCheck::checkEmail($email);
        $username = InputCheck::checkString($username);
        $password = InputCheck::checkPassword($password);

        if ($email != null && $username != null && $password != null) {

            if (self::checkUserUniqueness($email, $username)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $new_user = New User($email, $username, $hashed_password);
                $new_user->save();

                $_SESSION['message'] = "Registration was successful!";
                $_SESSION['msg_type'] = "success";

                return true;
                //header("Location: ../php/index.php");

                //exit();
            }
        }

        return false;
    }

    private static function checkUserUniqueness($email, $username) {
        $users = User::getAll("email=?", [$email]);
        if (count($users) > 0) {
            $_SESSION['message'] = "User with the specified email already exists ! Please enter another email and try again.";
            $_SESSION['msg_type'] = "warning";
            return false;
        }

        $users = User::getAll("username=?", [$username]);
        if (count($users) > 0) {
            $_SESSION['message'] = "User with the specified username already exists ! Please enter another username and try again.";
            $_SESSION['msg_type'] = "warning";
            return false;
        }

        return true;
    }
}