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
                    'playlists' => PlaylistsApp::getUserPlaylists(),
                    'message' => $this->request()->getValue('message'),
                    'message_type' => $this->request()->getValue('message_type')
                ]
            );
        }

        $message = "You are not signed in! If you want to browse your playlists you must be signed in.";
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
                    'playlist_songs' => $playlist->getPlaylistSongs(),
                    'message' => $this->request()->getValue('message'),
                    'message_type' => $this->request()->getValue('message_type')
                ]
            );
        }

        $message = "You cannot edit playlist of another user!";
        $message_type = "warning";

        $this->redirect("playlists", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );

        return null;

    }

    public function editPlaylist()
    {
        $playlist_id = $this->request()->getValue('id');
        $playlist_name = $this->request()->getValue('name');
        $file_name = $this->request()->getFile('inputFile')['name'];
        $tmp_name = $this->request()->getFile('inputFile')['tmp_name'];

        $message = "";
        $message_type = "";

        PlaylistsApp::editPlaylist($playlist_id, $playlist_name, $file_name, $tmp_name, $message, $message_type);

        $this->redirect("playlists", "",
            [
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }

    public function deletePlaylistSong()
    {
        $playlist_id = $this->request()->getValue('playlist_id');
        $song_id = $this->request()->getValue('song_id');

        $message = "";
        $message_type = "";

        PlaylistsApp::deleteSongFromPlaylist($playlist_id, $song_id, $message, $message_type);

        $this->redirect("playlists", "editPlaylistForm",
            [
                'id' => $playlist_id,
                'message' => $message,
                'message_type' => $message_type
            ]
        );
    }
}