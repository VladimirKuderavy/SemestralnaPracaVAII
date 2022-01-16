<?php

namespace App\Models;

use App\Config\Configuration;

class Song extends \App\Core\Model
{

    public function __construct(
        public int $id = 0,
        public string $name = "",
        public string $artist = "",
        public int $votes = 0,
        public ?string $cover = null
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name', 'artist', 'votes', 'cover'];
    }

    static public function setTableName()
    {
        return "songs";
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
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return int
     */
    public function getVotes(): int
    {
        return $this->votes;
    }

    /**
     * @param int $votes
     */
    public function setVotes(int $votes): void
    {
        $this->votes = $votes;
    }

    public function incVotes()
    {
        $this->votes++;
        $this->save();
    }

    /**
     * @return string|null
     */
    public function getCover(): ?string
    {
        return $this->cover;
    }

    /**
     * @param string|null $cover
     */
    public function setCover(?string $cover): void
    {
        $this->cover = $cover;
    }

    public function tryGetCoverPath(): string
    {
        if ($this->cover != null) {
            return Configuration::COVER_IMAGE_PATH.$this->cover;
        }

        return Configuration::DUMMY_IMAGE_PATH;
    }
}