<?php

namespace App;

use App\Config\Configuration;
use App\Models\Album;

class AlbumsApp
{
    public static function getAllAlbums() {
        return Album::getAll();
    }

    public static function insertAlbum($album_name, $artist, $file_name, $tmp_name, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $album_name = InputCheck::checkString($album_name, $message, $message_type);
            $artist = InputCheck::checkString($artist, $message, $message_type);
            $file_name = InputCheck::checkFileName($file_name, $message, $message_type);

            if ($album_name != null && $artist != null) {

                $new_file_name = null;

                if ($file_name != null && $tmp_name != null) {
                    $new_file_name = date("Y-m-d H-i-s").'_'.rand().'_'.$file_name;
                    move_uploaded_file($tmp_name, Configuration::COVER_IMAGE_PATH.$new_file_name);
                }

                $new_album = new Album(0, $album_name, $artist, 0, $new_file_name);
                $new_album->save();

                $message = "Album bol úspešne pridaný";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na pridanie albumu sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function deleteAlbum($id, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {

            $id = InputCheck::checkInteger($id, $message, $message_type);

            if ($id != null) {
                $album = Album::getOne($id);

                if ($album->getCover() != null) {
                    unlink(Configuration::COVER_IMAGE_PATH.$album->getCover());
                }

                $album->delete();

                $message = "Album bol úspešne odstranený!";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na odstránenie albumu sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function editAlbum($id, $album_name, $artist, $file_name, $tmp_name, &$message, &$message_type)
    {
        if (SignInApp::isUserLoggedIn()) {
            $id = InputCheck::checkInteger($id, $message, $message_type);
            $album_name = InputCheck::checkString($album_name, $message, $message_type);
            $artist = InputCheck::checkString($artist, $message, $message_type);
            $file_name = InputCheck::checkFileName($file_name, $message, $message_type);

            if ($id != null && $album_name != null && $artist != null) {
                $album = Album::getOne($id);
                $album->setName($album_name);
                $album->setArtist($artist);

                if ($file_name != null && $tmp_name != null) {
                    if ($album->getCover() != null) {
                        unlink(Configuration::COVER_IMAGE_PATH . $album->getCover());
                    }

                    $new_file_name = date("Y-m-d H-i-s") . '_' . rand() . '_' . $file_name;
                    move_uploaded_file($tmp_name, Configuration::COVER_IMAGE_PATH . $new_file_name);
                    $album->setCover($new_file_name);
                }

                $album->save();

                $message = "Album bol upravený!";
                $message_type = "success";

                return true;
            }

            return false;
        }

        $message = "Nie ste prihlasený! Na upravenie albumu sa musíte prihlásiť.";
        $message_type = "warning";

        return false;
    }

    public static function voteForAlbum($id, &$message, &$message_type)
    {
        $id = InputCheck::checkInteger($id, $message, $message_type);

        if ($id != null) {
            $album = Album::getOne($id);
            $album->incVotes();
        }
    }
}