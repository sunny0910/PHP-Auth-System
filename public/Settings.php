<?php
namespace PHP;

class Settings
{
    private $dbname;
    private $host;
    private $username;
    private $password;

    public function getdbname()
    {
        return $this->dbname;
    }

    public function gethost()
    {
        return $this->host;
    }

    public function getusername()
    {
        return $this->username;
    }

    public function getpassword()
    {
        return $this->password;
    }
    public function __construct()
    {
        $this->dbname = 'userdb';
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = 'wisdmlabs';
    }
}
