<?php

namespace app\src\includes\classes;

class UserController extends Database
{
    /**
     * User registration.
     * @param array $data
     * @return void
     */
    public function storeUser(array $data): void
    {
        $connection = $this->connect();

        $sql = "insert into `users` (`first_name`, `last_name`, `username`, `email`, `password`, `created_at`)
                values (?, ?, ?, ?, ?, ?)";

        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        $currentTime = date('Y-m-d');
        $stmt = $connection->prepare($sql);
        $stmt->execute([$data['first_name'], $data['last_name'], $data['username'], $data['email'], $hashedPassword, $currentTime]);
        $stmt = null;
    }
}