<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\RegistrationApp;

class RegistrationController extends AControllerRedirect
{

    public function index()
    {
        return $this->html();
    }

    public function registration()
    {
        $email = $this->request()->getValue('email');
        $username = $this->request()->getValue('username');
        $password = $this->request()->getValue('password');

        if (RegistrationApp::insertUser($email, $username, $password)) {
            $this->redirect("home");
        } else {
            $this->redirect("registration");
        }
    }
}