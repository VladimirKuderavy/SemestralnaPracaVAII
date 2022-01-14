<?php

namespace App;

use App\Config\Configuration;
use App\Models\Playlist;
use App\Models\Song;

class PlaylistsApp
{
    public static function createPlaylist($playlist_name, $file_name, $tmp_name, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $playlist_name = InputCheck::checkString($playlist_name, $message, $message_type);
            $file_name = InputCheck::checkFileName($file_name, $message, $message_type);

            if ($playlist_name != null) {

                $new_file_name = null;

                if ($file_name != null && $tmp_name != null) {
                    $new_file_name = date("Y-m-d H-i-s").'_'.rand().'_'.$file_name;
                    move_uploaded_file($tmp_name, Configuration::PLAYLIST_IMAGE_PATH.$new_file_name);
                }

                $new_playlist = new Playlist(0, $playlist_name, SignInApp::getUsername(), $new_file_name);
                $new_playlist->save();

                $message = "Playlist bol úspešne vytvorený";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na vytvorenie playlistu sa musíte prihlásiť.";
        $message_type = "warning";

        return false;

    }

    public static function deletePlaylist($id, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {

            $id = InputCheck::checkInteger($id, $message, $message_type);

            if ($id != null) {
                $playlist = Playlist::getOne($id);

                if ($playlist->getImage() != null) {
                    unlink(Configuration::PLAYLIST_IMAGE_PATH.$playlist->getImage());
                }

                $playlist->delete();

                $message = "Playlist bol úspešne odstranený!";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na odstránenie playlistu sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function getAllPlaylists()
    {
        return Playlist::getAll();
    }
}