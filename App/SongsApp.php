<?php

namespace App;

use App\Models\Song;
use App\Config\Configuration;

class SongsApp
{

    public static function insertSong($song_name, $artist, $file_name, $tmp_name, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $song_name = InputCheck::checkString($song_name, $message, $message_type);
            $artist = InputCheck::checkString($artist, $message, $message_type);
            $file_name = InputCheck::checkFileName($file_name, $message, $message_type);

            if ($song_name != null && $artist != null) {

                $new_file_name = null;

                if ($file_name != null && $tmp_name != null) {
                    $new_file_name = date("Y-m-d H-i-s").'_'.rand().'_'.$file_name;
                    move_uploaded_file($tmp_name, Configuration::COVER_IMAGE_PATH.$new_file_name);
                }

                $new_song = new Song(0, $song_name, $artist, 0, $new_file_name);
                $new_song->save();

                $message = "Skladba bola úspešne pridaná";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na pridanie skladby sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function deleteSong($id, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {

            $id = InputCheck::checkInteger($id, $message, $message_type);

            if ($id != null) {
                $song = Song::getOne($id);

                if ($song->getCover() != null) {
                    unlink(Configuration::COVER_IMAGE_PATH.$song->getCover());
                }

                $song->delete();

                $message = "Skladba bola úspešne odstranená!";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na odstránenie skladby sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function editSong($id, $song_name, $artist, $file_name, $tmp_name, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $id = InputCheck::checkInteger($id, $message, $message_type);
            $song_name = InputCheck::checkString($song_name, $message, $message_type);
            $artist = InputCheck::checkString($artist, $message, $message_type);
            $file_name = InputCheck::checkFileName($file_name, $message, $message_type);

            if ($id != null && $song_name != null && $artist != null) {
                $song = Song::getOne($id);
                $song->setName($song_name);
                $song->setArtist($artist);

                if ($file_name != null && $tmp_name != null) {
                    if ($song->getCover() != null) {
                        unlink(Configuration::COVER_IMAGE_PATH . $song->getCover());
                    }

                    $new_file_name = date("Y-m-d H-i-s") . '_' . rand() . '_' . $file_name;
                    move_uploaded_file($tmp_name, Configuration::COVER_IMAGE_PATH . $new_file_name);
                    $song->setCover($new_file_name);
                }

                $song->save();

                $message = "Skladba bola upravená!";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na upravenie skladby sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function getAllSongs()
    {
        return Song::getAll();
    }

    public static function voteForSong($id, &$message, &$message_type)
    {
        $id = InputCheck::checkInteger($id, $message, $message_type);

        if ($id != null) {
            $song = Song::getOne($id);
            $song->incVotes();

            $message = null;
            $message_type = null;
        }
    }
}