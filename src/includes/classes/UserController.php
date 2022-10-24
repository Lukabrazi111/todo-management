<?php

namespace app\src\includes\classes;

use app\src\libs\Helpers;

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

    /**
     * User authorization.
     * @param array $data
     */
    public function auth($data): void
    {
        $username_email = $data['username_email'];
        $password = $data['password'];

        $connect = $this->connect();
        $sql = "select username, email, password from `users` where (`username` = ? or `email` = ?) and `password` = ?";
        $stmt = $connect->prepare($sql);

        $stmt->execute([$username_email, $username_email, $password]);

        if ($stmt->rowCount() <= 0) {
            $helper = new Helpers();

            $helper->redirectWithSession('login.php', 'error', 'Incorrect username or password!');
            exit();
        }

        $_SESSION['logged_in'] = true;
        header('Location: ../index.php');
        $stmt = null;
    }
}