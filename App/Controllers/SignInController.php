<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\SignInApp;

class SignInController extends AControllerRedirect
{
    public function index()
    {
        return $this->html();
    }

    public function signIn()
    {
        $email = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');

        if (SignInApp::confirmUser($email, $password)) {
            $message = "Uspesne si sa prihlasil.";
            $msg_type = 'success';

            $this->redirect("home", "", [
                'message' => $message,
                'msg_type' => $msg_type
            ]);
        } else {
            $this->redirect("signin");
        }
    }

    public function logout()
    {
        SignInApp::logoutUser();
        $this->redirect("home");
    }
}