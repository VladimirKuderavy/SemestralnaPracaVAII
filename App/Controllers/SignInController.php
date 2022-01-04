<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\SignInApp;

class SignInController extends AControllerRedirect
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

    public function signIn()
    {
        $email = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');

        $message = "";
        $message_type = "";

        if (SignInApp::confirmUser($email, $password, $message, $message_type)) {

            $this->redirect("home", "",
                [
                    'message' => $message,
                    'message_type' => $message_type
                ]
            );
        } else {
            $this->redirect("signin", "",
                [
                    'message' => $message,
                    'message_type' => $message_type
                ]
            );
        }
    }

    public function logout()
    {
        $message = "";
        $message_type = "";

        SignInApp::logoutUser($message, $message_type);

        $this->redirect("home", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }
}