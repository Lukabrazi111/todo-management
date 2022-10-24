<?php

namespace app\src\includes\classes;

use PDO;
use PDOException;

class Database
{
    protected string $server_name = 'localhost';
    protected string $username = 'root';
    protected string $password = '';
    protected string $database_name = 'todo_management';

    public function connect()
    {
        try {
            $connect = new PDO("mysql:host=$this->server_name;dbname=$this->database_name", $this->username, $this->password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch (PDOException $exception) {
            die('Connection failed! ' . $exception->getMessage());
        }
    }
}