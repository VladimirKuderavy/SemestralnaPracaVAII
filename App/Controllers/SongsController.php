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
                'songs' => SongsApp::getAllSongs()
            ]
        );
    }

    public function addSong()
    {
        $songName = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');

        SongsApp::insertSong($songName, $artist);
        $this->redirect("songs");
    }

    public function deleteSong()
    {
        $id = $this->request()->getValue('id');

        SongsApp::deleteSong($id);
        $this->redirect("songs");
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

        SongsApp::editSong($id, $songName, $artist);

        $this->redirect("Songs");
    }

    public function voteForSong()
    {
        $id = $this->request()->getValue('id');
        SongsApp::voteForSong($id);

        $this->redirect("songs");
    }
}