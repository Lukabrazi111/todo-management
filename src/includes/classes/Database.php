<?php

namespace app\src\includes;

use PDO;
use PDOException;

class Database
{
    protected string $server_name = 'localhost';
    protected string $username = 'root';
    protected string $password = '';
    protected string $database_name = 'todo_management';

    public function __construct()
    {
        try {
            $connect = new PDO("mysql:host=$this->server_name;dbname=$this->database_name", $this->username, $this->password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection failed! " . $exception->getMessage();
        }
    }
}