<?php

namespace App;

use App\Models\Song;

class SongsApp
{

    public static function insertSong($songName, $artist, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $songName = InputCheck::checkString($songName, $message, $message_type);
            $artist = InputCheck::checkString($artist, $message, $message_type);

            if ($songName != null && $artist != null) {
                $newSong = new Song(0, $songName, $artist);
                $newSong->save();

                $message = "Skladba bola úspešne pridaná";
                $message_type = "success";

                return true;
            }
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
                Song::getOne($id)->delete();

                $message = "Skladba bola úspešne odstranená!";
                $message_type = "success";

                return true;
            }
        }

        $message = "Nie ste prihlasený! Na odstránenie skladby sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function editSong($id, $songName, $artist, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $id = InputCheck::checkInteger($id, $message, $message_type);
            $songName = InputCheck::checkString($songName, $message, $message_type);
            $artist = InputCheck::checkString($artist, $message, $message_type);

            if ($id != null && $songName != null && $artist != null) {
                $song = Song::getOne($id);
                $song->setName($songName);
                $song->setArtist($artist);
                $song->save();

                $message = "Skladba bola upravená!";
                $message_type = "success";
            }
        }

        $message = "Nie ste prihlasený! Na upravenie skladby sa musíte prihlásiť.";
        $message_type = "warning";
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
        }

        return false;
    }
}