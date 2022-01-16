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

    public function addSongForm() {
        return $this->html();
    }

    public function addSong()
    {
        $song_name = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');
        $file_name = $this->request()->getFile('inputFile')['name'];
        $tmp_name = $this->request()->getFile('inputFile')['tmp_name'];

        $message = "";
        $message_type = "";

        SongsApp::insertSong($song_name, $artist, $file_name, $tmp_name, $message, $message_type);

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

        return $this->html(
            [
                'song' => Song::getOne($id)
            ]
        );
    }

    public function editSong()
    {
        $id = $this->request()->getValue('id');
        $song_name = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');

        $file_name = $this->request()->getFile('inputFile')['name'];
        $tmp_name = $this->request()->getFile('inputFile')['tmp_name'];

        $message = "";
        $message_type = "";

        SongsApp::editSong($id, $song_name, $artist, $file_name, $tmp_name, $message, $message_type);

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

    public function songDetails()
    {
        $id = $this->request()->getValue('id');

        return $this->html(
            [
                'song' => Song::getOne($id)
            ]
        );
    }
}