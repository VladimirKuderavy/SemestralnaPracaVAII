<?php

namespace App;

use App\Core\DB\Connection;
use App\Models\Song;

class ChartsApp
{
    public static function getTop10Songs()
    {
        $top10Songs = Connection::connect()->prepare("SELECT * FROM songs ORDER BY votes DESC LIMIT 10");
        $top10Songs->execute([]);

        $songs = [];

        foreach ($top10Songs->fetchAll() as $song) {
            $songs[] = new Song($song[0], $song[1], $song[2], $song[3]);
        }

        return $songs;
    }
}