<?php

namespace App\Controllers;

use App\ChartsApp;
use App\SongsApp;

class ChartsController extends AControllerRedirect
{
    public function index()
    {
        return $this->html(
            [
                'top_songs' => ChartsApp::getTop10Songs()
            ]
        );
    }

    public function voteForSong()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        SongsApp::voteForSong($id, $message, $message_type);

        $this->redirect("charts", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }
}