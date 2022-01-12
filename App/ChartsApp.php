<?php

namespace App;

use App\Core\DB\Connection;
use App\Models\Song;

class ChartsApp
{
    public static function getTop10Songs()
    {
        $top_10_songs = Connection::connect()->prepare("SELECT * FROM songs ORDER BY votes DESC LIMIT 10");
        $top_10_songs->execute([]);

        $songs = [];

        foreach ($top_10_songs->fetchAll() as $song) {
            $songs[] = new Song($song[0], $song[1], $song[2], $song[3], $song[4]);
        }

        return $songs;
    }

    public static function getTop10Albums()
    {
        $top_10_albums = Connection::connect()->prepare("SELECT * FROM albums ORDER BY votes DESC LIMIT 10");
        $top_10_albums->execute([]);

        $albums = [];

        foreach ($top_10_albums->fetchAll() as $album) {
            $albums[] = new Song($album[0], $album[1], $album[2], $album[3], $album[4]);
        }

        return $albums;
    }
}