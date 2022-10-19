<?php

namespace app\src\includes\classes;

class Validation
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
    public function checkEmptyFields(): bool
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
}