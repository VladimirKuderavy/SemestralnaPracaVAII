<?php
require 'Database.php';
require 'Song.php';
class App
{
    private Database $database;
    private ?Song $updatedSong = null;

    public function __construct()
    {
        session_start();
        $this->database = new Database();

        $this->insertSong();
        $this->deleteSong();
        $this->editSong();
        $this->updateSong();
    }

    private function insertSong()
    {
        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $artist = $_POST['artist'];

            $newSong = new Song(name: $name, artist: $artist);

            $this->database->insertSong($newSong);

            $_SESSION['message'] = "Record has been saved!";
            $_SESSION['msg_type'] = "success";
        }
    }

    /**
     * @return bool
     */
    public function isUpdate(): bool
    {
        return $this->updatedSong != null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        if ($this->updatedSong != null) {
            return $this->updatedSong->getName();
        }
        return '';
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        if ($this->updatedSong != null) {
            return $this->updatedSong->getArtist();
        }
        return '';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        if ($this->updatedSong != null) {
            return $this->updatedSong->getId();
        }
        return 0;
    }

    private function deleteSong()
    {
        if (isset($_GET['delete']))
        {
            $songID = $_GET['delete'];

            $this->database->deleteSong($songID);

            $_SESSION['message'] = "Record has been deleted!";
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
                $this->updatedSong = new Song($result['id'], $result['name'], $result['artist']);
            }
        }
    }

    private function updateSong()
    {
        if (isset($_POST['update']))
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $artist = $_POST['artist'];

            $this->database->updateSong($name, $artist, $id);

            $_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "success";
        }
    }

    public function getAllSongs()
    {
        return $this->database->getAllSongs();
    }
}