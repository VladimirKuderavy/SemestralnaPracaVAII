<?php

namespace App;

use App\Config\Configuration;
use App\Core\DB\Connection;
use App\Models\Playlist;
use App\Models\PlaylistSong;
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

                if ($playlist->getUserId() != SignInApp::getUsername()) {
                    $message = "Nemôžete odstraniť cudzí playlist!";
                    $message_type = "warning";

                    return false;
                }

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

    public static function getUserPlaylists()
    {
        if (SignInApp::isUserLoggedIn()) {
            return Playlist::getAll("user_id = ?", [SignInApp::getUsername()]);
        }

        return [];
    }

    public static function addSongToPlaylist($playlist_id, $song_id, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $playlist_id = InputCheck::checkInteger($playlist_id, $message, $message_type);
            $song_id = InputCheck::checkInteger($song_id, $message, $message_type);

            if ($playlist_id != null && $song_id != null) {
                $already_in_playlist = PlaylistSong::getAll("playlist_id = ? and song_id = ?", [$playlist_id, $song_id]);

                if (count($already_in_playlist) > 0) {
                    $message = "Pesničku nebolo možné pridať! Pesnička sa už nachádza vo vybranom playliste.";
                    $message_type = "warning";

                    return false;
                }

                $playlist_song = new PlaylistSong($playlist_id, $song_id);
                $playlist_song->save();

                $message = "Pesnička bola úspešne pridaná do playlistu!";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na pridanie pesničky do playlistu sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function deleteSongFromPlaylist($playlist_id, $song_id, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $playlist_id = InputCheck::checkInteger($playlist_id, $message, $message_type);
            $song_id = InputCheck::checkInteger($song_id, $message, $message_type);

            if ($playlist_id != null && $song_id != null) {
                $delete_row = Connection::connect()->prepare("DELETE FROM playlist_songs WHERE playlist_id = ? and song_id = ?");
                $delete_row->execute([$playlist_id, $song_id]);

                $message = "Pesnička bola úspešne odstranená z playlistu!";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na odobratie pesničky z playlistu sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }
}