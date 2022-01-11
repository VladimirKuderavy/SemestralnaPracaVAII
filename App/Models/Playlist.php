<?php

namespace App\Models;

class Playlist extends \App\Core\Model
{

    public function __construct(
        public int $id = 0,
        public string $name = "",
        public string $user_id = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name', 'user_id'];
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
}