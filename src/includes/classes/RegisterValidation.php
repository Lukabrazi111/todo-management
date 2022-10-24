<?php

namespace app\src\includes\classes;

class RegisterValidation extends Database
{
    private array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Check empty fields.
     * @param array $data
     * @return bool
     */
    public function checkEmptyFields()
    {
        if (
            empty($this->data['first_name']) ||
            empty($this->data['last_name']) ||
            empty($this->data['username']) ||
            empty($this->data['email']) ||
            empty($this->data['password']) ||
            empty($this->data['confirmation_password'])
        ) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    /**
     * Check password match.
     * @return bool
     */
    public function checkPasswordMatch(): bool
    {
        if ($this->data['password'] !== $this->data['confirmation_password']) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    /**
     * Check fields length.
     * @param $data
     * @return bool
     */
    public function checkLength($data): bool
    {
        if (strlen($data) < 5) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    /**
     * Check email validation.
     * @return bool
     */
    public function checkEmail(): bool
    {
        $email = $this->data['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    /**
     * Check unique username.
     * @param $username
     * @return bool
     */
    public function userExist($username, $email): bool
    {
        $connect = $this->connect();

        $sql = "select * from `users` where `username` = ? or `email` = ?";

        $stmt = $connect->prepare($sql);
        $stmt->execute([$username, $email]);

        if ($stmt->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}