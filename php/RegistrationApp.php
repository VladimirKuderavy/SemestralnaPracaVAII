<?php
require 'Database.php';
require 'InputCheck.php';
class RegistrationApp
{
    private Database $database;

    public function __construct()
    {
        session_start();

        $this->database = new Database();

        $this->insertUser();
    }

    private function insertUser()
    {
        if (isset($_POST['submit'])) {
            $email = InputCheck::checkEmail($_POST['email']);
            $username = InputCheck::checkString($_POST['username']);
            $password = InputCheck::checkPassword($_POST['password']);

            if ($email != null && $username != null && $password != null) {

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                if ($this->database->checkInputUniqueness($email, $username)) {
                    $this->database->insertUser($email, $username, $hashed_password);

                    $_SESSION['message'] = "Registration was successful!";
                    $_SESSION['msg_type'] = "success";

                    header("Location: ../php/index.php");

                    exit();
                } else {
                    $_SESSION['message'] = "User with the specified username or email already exists ! Please try again.";
                    $_SESSION['msg_type'] = "warning";
                }
            }
        }
    }
}