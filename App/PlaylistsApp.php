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
                    $new_file_name = date("Y-m-d H-i-s") . '_' . rand() . '_' . $file_name;
                    move_uploaded_file($tmp_name, Configuration::PLAYLIST_IMAGE_PATH . $new_file_name);
                }

                $new_playlist = new Playlist(0, $playlist_name, SignInApp::getUsername(), $new_file_name);
                $new_playlist->save();

                $message = "Playlist was created successfully.";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "You are not signed in! If you want to create new playlist you must be signed in.";
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
                    $message = "You cannot delete playlist of another user!";
                    $message_type = "warning";

                    return false;
                }

                if ($playlist->getImage() != null) {
                    unlink(Configuration::PLAYLIST_IMAGE_PATH.$playlist->getImage());
                }

                $playlist->delete();

                $message = "Playlist was deleted successfully.";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "You are not signed in! If you want to delete playlist you must be signed in.";
        $message_type = "warning";

        return false;
    }

    public static function editPlaylist($id, $playlist_name, $file_name, $tmp_name, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $id = InputCheck::checkInteger($id, $message, $message_type);
            $playlist_name = InputCheck::checkString($playlist_name, $message, $message_type);
            $file_name = InputCheck::checkFileName($file_name, $message, $message_type);

            if ($playlist_name != null) {

                $playlist = Playlist::getOne($id);

                if ($playlist->getUserId() != SignInApp::getUsername()) {
                    $message = "You cannot edit playlist of another user!";
                    $message_type = "warning";

                    return false;
                }

                $playlist->setName($playlist_name);

                if ($file_name != null && $tmp_name != null) {
                    if ($playlist->getImage() != null) {
                        unlink(Configuration::PLAYLIST_IMAGE_PATH.$playlist->getImage());
                    }

                    $new_file_name = date("Y-m-d H-i-s") . '_' . rand() . '_' . $file_name;
                    move_uploaded_file($tmp_name, Configuration::PLAYLIST_IMAGE_PATH . $new_file_name);
                    $playlist->setImage($new_file_name);
                }

                $playlist->save();

                $message = "Playlist was edited.";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "You are not signed in! If you want to edit playlist you must be signed in.";
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
                    $message = "Song could not be added! Song is already in the selected playlist.";
                    $message_type = "warning";

                    return false;
                }

                $playlist_song = new PlaylistSong($playlist_id, $song_id);
                $playlist_song->save();

                $message = "Song was successfully added into playlist.";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "You are not signed in! If you want to add song into playlist you must be signed in.";
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

                $message = "Song was successfully removed from playlist.";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "You are not signed in! If you want to remove song from playlist you must be signed in.";
        $message_type = "warning";

        return false;
    }
}