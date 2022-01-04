<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\RegistrationApp;

class RegistrationController extends AControllerRedirect
{

    public function index()
    {
        return $this->html(
            [
                'message' => $this->request()->getValue('message'),
                'message_type' => $this->request()->getValue('message_type')
            ]
        );
    }

    public function registration()
    {
        $email = $this->request()->getValue('email');
        $username = $this->request()->getValue('username');
        $password = $this->request()->getValue('password');

        $message = "";
        $message_type = "";

        if (RegistrationApp::insertUser($email, $username, $password, $message, $message_type)) {
            $this->redirect("home", "",
                [
                    'message' => $message,
                    'message_type' => $message_type
                ]
            );
        } else {
            $this->redirect("registration", "",
                [
                    'message' => $message,
                    'message_type' => $message_type
                ]
            );
        }
    }
}