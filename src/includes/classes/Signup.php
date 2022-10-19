<?php

namespace app\src\includes\classes;

class Signup extends Database
{
    public function storeUser(array $data)
    {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        $sql = "insert into `users` (`first_name`, `last_name`, `username`, `email`, `password`)
                values ('$first_name', '$last_name', '$username', '$email', '$password')";

        $connection = $this->connect();

        if ($connection->query($sql)) {
            echo "New record created!";
        } else {
            echo "error: " . $connection->errorCode();
        }
    }
}