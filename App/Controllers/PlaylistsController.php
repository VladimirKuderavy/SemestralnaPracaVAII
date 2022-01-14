<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\PlaylistsApp;

class PlaylistsController extends AControllerRedirect
{
    public function index()
    {
        return $this->html(
            [
                'playlists' => PlaylistsApp::getAllPlaylists(),
                'message' => $this->request()->getValue('message'),
                'message_type' => $this->request()->getValue('message_type')
            ]
        );
    }

    public function addPlaylistForm()
    {
        return $this->html();
    }

    public function addPlaylist()
    {
        $playlist_name = $this->request()->getValue('name');
        $file_name = $this->request()->getFile('inputFile')['name'];
        $tmp_name = $this->request()->getFile('inputFile')['tmp_name'];

        $message = "";
        $message_type = "";

        PlaylistsApp::createPlaylist($playlist_name, $file_name, $tmp_name, $message, $message_type);

        $this->redirect("playlists", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }
}