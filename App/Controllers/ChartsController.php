<?php

namespace App\Controllers;

use App\ChartsApp;
use App\Models\Song;

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
        ChartsApp::voteForSong($id);

        $this->redirect("charts");
    }
}