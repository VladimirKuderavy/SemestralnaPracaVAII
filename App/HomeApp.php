<?php

namespace App;

use App\Core\DB\Connection;
use App\Models\Album;
use App\Models\Song;

class HomeApp
{
    public static function getRecentlyAddedSongs()
    {
        $recently_added_songs = Connection::connect()->prepare("SELECT * FROM songs ORDER BY id DESC LIMIT 3");
        $recently_added_songs->execute([]);

        $songs = [];

        foreach ($recently_added_songs->fetchAll() as $song) {
            $songs[] = new Song($song[0], $song[1], $song[2], $song[3], $song[4]);
        }

        return $songs;
    }

    public static function getRecentlyAddedAlbums()
    {
        $recently_added_albums = Connection::connect()->prepare("SELECT * FROM albums ORDER BY id DESC LIMIT 3");
        $recently_added_albums->execute([]);

        $albums = [];

        foreach ($recently_added_albums->fetchAll() as $album) {
            $albums[] = new Album($album[0], $album[1], $album[2], $album[3], $album[4]);
        }

        return $albums;
    }
}