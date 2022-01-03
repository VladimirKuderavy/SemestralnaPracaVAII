<?php

namespace App\Models;

class User extends \App\Core\Model
{

    public function __construct(
        public string $email = "",
        public string $username = "",
        public string $password = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['email', 'username', 'password'];
    }

    static public function setTableName()
    {
        return "users";
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}