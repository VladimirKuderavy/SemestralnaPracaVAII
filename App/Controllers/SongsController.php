<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Song;
use App\SongsApp;

class SongsController extends AControllerRedirect
{

    public function index()
    {
        return $this->html(
            [
                'songs' => SongsApp::getAllSongs(),
                'message' => $this->request()->getValue('message'),
                'message_type' => $this->request()->getValue('message_type')
            ]
        );
    }

    public function addSong()
    {
        $songName = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');

        $message = "";
        $message_type = "";

        SongsApp::insertSong($songName, $artist, $message, $message_type);

        $this->redirect("songs", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function deleteSong()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        SongsApp::deleteSong($id, $message, $message_type);

        $this->redirect("songs", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function editSongForm()
    {
        $id = $this->request()->getValue('id');
        $songName = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');

        return $this->html(
            [
                'id' => $id,
                'name' => $songName,
                'artist' => $artist,
                'songs' => SongsApp::getAllSongs()
            ]
        );
    }

    public function editSong()
    {
        $id = $this->request()->getValue('id');
        $songName = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');

        $message = "";
        $message_type = "";

        SongsApp::editSong($id, $songName, $artist, $message, $message_type);

        $this->redirect("songs", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function voteForSong()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        SongsApp::voteForSong($id, $message, $message_type);

        $this->redirect("songs", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }
}