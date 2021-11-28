<?php
require 'Database.php';
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
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->database->checkInputUniqueness($email, $username)) {
                $this->database->insertUser($email, $username, $password);

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