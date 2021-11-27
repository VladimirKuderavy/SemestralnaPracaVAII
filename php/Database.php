<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:hostname=localhost; dbname=db_semestralka', 'root', 'dtb456');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insertSong(Song $song)
    {
        $this->connection->prepare("INSERT INTO songs(name, artist) VALUES (?, ?)")
            ->execute([$song->getName(), $song->getArtist()]);
    }

    public function deleteSong(int $songID)
    {
        $this->connection->prepare("DELETE FROM songs WHERE id = ?")->execute([$songID]);
    }

    public function editSong(int $songID)
    {
        $result = $this->connection->prepare("SELECT * FROM songs WHERE id = ?");

        if ($result->execute([$songID])) {
            return $result->fetch();
        }

        return null;
    }

    public function updateSong(string $name, string $artist, int $songID)
    {
        $this->connection->prepare("UPDATE songs SET name = ?, artist = ? WHERE id = ?")->execute([$name, $artist, $songID]);
    }

    public function getAllSongs()
    {
        $result = $this->connection->prepare("SELECT * FROM songs");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Song::class);
    }
}