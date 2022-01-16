<?php

namespace App\Models;

class PlaylistSong extends \App\Core\Model
{

    public function __construct(
        public int $playlist_id = 0,
        public int $song_id = 0
    )
    {
    }

    static public function setDbColumns()
    {
        return ['playlist_id', 'song_id'];
    }

    static public function setTableName()
    {
        return "playlist_songs";
    }

    /**
     * @return int
     */
    public function getPlaylistId(): int
    {
        return $this->playlist_id;
    }

    /**
     * @param int $playlist_id
     */
    public function setPlaylistId(int $playlist_id): void
    {
        $this->playlist_id = $playlist_id;
    }

    /**
     * @return int
     */
    public function getSongId(): int
    {
        return $this->song_id;
    }

    /**
     * @param int $song_id
     */
    public function setSongId(int $song_id): void
    {
        $this->song_id = $song_id;
    }
}