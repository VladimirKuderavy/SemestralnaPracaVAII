<?php

namespace App\Controllers;

use App\AlbumsApp;
use App\Core\Responses\Response;
use App\Models\Album;

class AlbumsController extends AControllerRedirect
{

    public function index()
    {
        return $this->html(
            [
                'albums' => AlbumsApp::getAllAlbums(),
                'message' => $this->request()->getValue('message'),
                'message_type' => $this->request()->getValue('message_type')
            ]
        );
    }

    public function addAlbumForm() {
        return $this->html();
    }

    public function addAlbum()
    {
        $album_name = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');
        $file_name = $this->request()->getFile('inputFile')['name'];
        $tmp_name = $this->request()->getFile('inputFile')['tmp_name'];

        $message = "";
        $message_type = "";

        AlbumsApp::insertAlbum($album_name, $artist, $file_name, $tmp_name, $message, $message_type);

        $this->redirect("albums", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function deleteAlbum()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        AlbumsApp::deleteAlbum($id, $message, $message_type);

        $this->redirect("albums", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function editAlbumForm()
    {
        $id = $this->request()->getValue('id');

        return $this->html(
            [
                'album' => Album::getOne($id)
            ]
        );
    }

    public function editAlbum()
    {
        $id = $this->request()->getValue('id');
        $album_name = $this->request()->getValue('name');
        $artist = $this->request()->getValue('artist');

        $file_name = $this->request()->getFile('inputFile')['name'];
        $tmp_name = $this->request()->getFile('inputFile')['tmp_name'];

        $message = "";
        $message_type = "";

        AlbumsApp::editAlbum($id, $album_name, $artist, $file_name, $tmp_name, $message, $message_type);

        $this->redirect("albums", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function voteForAlbum()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        AlbumsApp::voteForAlbum($id, $message, $message_type);

        $this->redirect("albums", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function albumDetails()
    {
        $id = $this->request()->getValue('id');

        return $this->html(
            [
                'album' => Album::getOne($id),
                'message' => $this->request()->getValue('message'),
                'message_type' => $this->request()->getValue('message_type')
            ]
        );
    }

    public function albumDetailsVoteForAlbum()
    {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        AlbumsApp::voteForAlbum($id, $message, $message_type);

        $this->redirect("albums", "albumDetails",
            [
                'id' => $id,
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }
}