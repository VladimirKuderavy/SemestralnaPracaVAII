<?php

namespace App;

use App\Models\Song;

class SongsApp
{

    public static function insertSong($songName, $artist)
    {
        if (SignInApp::isUserLoggedIn()) {
            $songName = InputCheck::checkString($songName);
            $artist = InputCheck::checkString($artist);

            if ($songName != null && $artist != null) {
                $newSong = new Song(0, $songName, $artist);
                $newSong->save();

                $_SESSION['message'] = "Song has been added!";
                $_SESSION['msg_type'] = "success";

                return true;
            }
        }

        return false;
    }

    public static function deleteSong($id)
    {
        if (SignInApp::isUserLoggedIn()) {

            $id = InputCheck::checkInteger($id);

            if ($id != null) {
                Song::getOne($id)->delete();

                $_SESSION['message'] = "Song has been deleted!";
                $_SESSION['msg_type'] = "success";

                return true;
            }
        }

        return false;
    }

    public static function editSong($id, $songName, $artist)
    {
        if (SignInApp::isUserLoggedIn()) {
            $id = InputCheck::checkInteger($id);
            $songName = InputCheck::checkString($songName);
            $artist = InputCheck::checkString($artist);

            if ($id != null && $songName != null && $artist != null) {
                $song = Song::getOne($id);
                $song->setName($songName);
                $song->setArtist($artist);
                $song->save();

                $_SESSION['message'] = "Song has been edited!";
                $_SESSION['msg_type'] = "success";
            }
        }
    }

    public static function getAllSongs()
    {
        return Song::getAll();
    }

    public static function voteForSong($id)
    {
        $id = InputCheck::checkInteger($id);

        if ($id != null) {
            $song = Song::getOne($id);
            $song->incVotes();
        }

        return false;
    }
}