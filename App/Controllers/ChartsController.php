<?php

namespace App\Controllers;

use App\AlbumsApp;
use App\ChartsApp;
use App\SongsApp;

class ChartsController extends AControllerRedirect
{
    public function index()
    {
        return $this->html(
            [
                'top_songs' => ChartsApp::getTop10Songs(),
                'top_albums' => ChartsApp::getTop10Albums()
            ]
        );
    }

    public function voteForSong()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        SongsApp::voteForSong($id, $message, $message_type);

        return $this->json([
            'message' => $message,
            'message_type' => $message_type
        ]);
    }

    public function voteForAlbum()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        AlbumsApp::voteForAlbum($id, $message, $message_type);

        return $this->json([
            'message' => $message,
            'message_type' => $message_type
        ]);
    }
}