<?php
require 'Database.php';
class SignInApp
{
    private Database $database;

    public function __construct()
    {
        session_start();

        $this->database = new Database();

        $this->confirmUser();
    }

    private function confirmUser()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->database->findUser($email);

            if ($user != null) {
                if (password_verify($password, $user['password'])) {

                    $_SESSION['user'] = $user['username'];
                    $_SESSION['message'] = "Login was successful!";
                    $_SESSION['msg_type'] = "success";

                    header("Location: ../php/index.php");

                    exit();
                } else {
                    $_SESSION['message'] = "Wrong password!";
                    $_SESSION['msg_type'] = "warning";
                }
            } else {
                $_SESSION['message'] = "Wrong email!";
                $_SESSION['msg_type'] = "warning";
            }
        }
    }
}