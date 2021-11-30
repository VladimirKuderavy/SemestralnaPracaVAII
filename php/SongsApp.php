<?php
require 'Database.php';
require 'Song.php';
require 'InputCheck.php';
class SongsApp
{
    private Database $database;
    private Song $updatedSong;

    public function __construct()
    {
        session_start();

        $this->database = new Database();
        $this->updatedSong = new Song();

        $this->insertSong();
        $this->deleteSong();
        $this->editSong();
        $this->updateSong();
    }

    /**
     * @return bool
     */
    public function isUpdate(): bool
    {
        return $this->updatedSong->getID() != 0;
    }

    /**
     * @return string
     */
    public function getSongName(): string
    {
        return $this->updatedSong->getName();
    }

    /**
     * @return string
     */
    public function getSongArtist(): string
    {
        return $this->updatedSong->getArtist();
    }

    /**
     * @return int
     */
    public function getSongID(): int
    {
        return $this->updatedSong->getID();
    }

    private function insertSong()
    {
        if (isset($_POST['submit']))
        {
            $name = InputCheck::checkString($_POST['name']);
            $artist = InputCheck::checkString($_POST['artist']);

            if ($name != null && $artist != null) {
                $newSong = new Song(name: $name, artist: $artist);

                $this->database->insertSong($newSong);

                $_SESSION['message'] = "Song has been added!";
                $_SESSION['msg_type'] = "success";
            }
        }
    }

    private function deleteSong()
    {
        if (isset($_GET['delete']))
        {
            $songID = $_GET['delete'];

            $this->database->deleteSong($songID);

            $_SESSION['message'] = "Song has been deleted!";
            $_SESSION['msg_type'] = "success";
        }
    }

    private function editSong()
    {
        if (isset($_GET['edit']))
        {
            $songID = $_GET['edit'];
            $result = $this->database->editSong($songID);

            if ($result != null) {
                $this->updatedSong->setId($result['id']);
                $this->updatedSong->setName($result['name']);
                $this->updatedSong->setArtist($result['artist']);
            }
        }
    }

    private function updateSong()
    {
        if (isset($_POST['update']))
        {
            $id = InputCheck::checkInteger($_POST['id']);
            $name = InputCheck::checkString($_POST['name']);
            $artist = InputCheck::checkString($_POST['artist']);

            if ($id != null && $name != null && $artist != null) {
                $this->database->updateSong($name, $artist, $id);

                $_SESSION['message'] = "Song has been updated!";
                $_SESSION['msg_type'] = "success";
            }
        }
    }

    public function getAllSongs()
    {
        return $this->database->getAllSongs();
    }
}