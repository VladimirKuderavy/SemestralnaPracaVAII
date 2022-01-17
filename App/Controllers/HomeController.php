<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\HomeApp;

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
                'songs' => HomeApp::getRecentlyAddedSongs(),
                'albums' => HomeApp::getRecentlyAddedAlbums(),
                'message' => $this->request()->getValue('message'),
                'message_type' => $this->request()->getValue('message_type')
            ]
        );
    }
}