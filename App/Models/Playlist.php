<?php

namespace App\Models;

use App\Config\Configuration;
use App\Core\DB\Connection;

class Playlist extends \App\Core\Model
{

    public function __construct(
        public int $id = 0,
        public string $name = "",
        public string $user_id = "",
        public ?string $image = null
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name', 'user_id', 'image'];
    }

    static public function setTableName()
    {
        return "playlists";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function tryGetImagePath(): string
    {
        if ($this->image != null) {
            return Configuration::PLAYLIST_IMAGE_PATH.$this->image;
        }

        return Configuration::DUMMY_IMAGE_PATH;
    }

    public function getPlaylistSongs()
    {
        $pr = Connection::connect()->prepare(
            'SELECT id, name, artist, votes, cover FROM songs JOIN playlist_songs ps on songs.id = ps.song_id and ps.playlist_id = ?'
        );
        $pr->execute([$this->id]);

        $playlist_songs = [];

        foreach ($pr->fetchAll() as $song) {
            $playlist_songs[] = new Song($song['id'], $song['name'], $song['artist'], $song['votes'], $song['cover']);
        }

        return $playlist_songs;
    }
}