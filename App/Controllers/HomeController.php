<?php

namespace App\Controllers;

use App\Core\AControllerBase;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{

    public function index()
    {
        return $this->html(
            [
                'message' => $this->request()->getValue('message'),
                'msg_type' => $this->request()->getValue('msg_type')
            ]
        );
    }
}