<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Playlist;
use App\PlaylistsApp;
use App\SignInApp;

class PlaylistsController extends AControllerRedirect
{
    public function index()
    {
        if (SignInApp::isUserLoggedIn()) {
            return $this->html(
                [
                    'playlists' => Playlist::getAll("user_id = ?", [SignInApp::getUsername()]),
                    'message' => $this->request()->getValue('message'),
                    'message_type' => $this->request()->getValue('message_type')
                ]
            );
        }

        $message = "Nie ste prihlasený! Na prehliadanie playlistov sa musíte prihlásiť.";
        $message_type = "warning";

        $this->redirect("signin", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );

        return null;

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

    public function deletePlaylist() {
        $id = $this->request()->getValue('id');

        $message = "";
        $message_type = "";

        PlaylistsApp::deletePlaylist($id, $message, $message_type);

        $this->redirect("playlists", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function editPlaylistForm()
    {
        $id = $this->request()->getValue('id');
        $playlist = Playlist::getOne($id);

        if (SignInApp::isUserLoggedIn() && SignInApp::getUsername() == $playlist->getUserId()) {
            return $this->html(
                [
                    'playlist' => $playlist,
                    'playlist_songs' => $playlist->getPlaylistSongs()
                ]
            );
        }

        $message = "Nie je možné upravovať playlist iného použivateľa!";
        $message_type = "warning";

        $this->redirect("playlists", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );

        return null;

    }
}