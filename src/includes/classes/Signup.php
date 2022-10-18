<?php

namespace app\src\includes\classes;

class Signup extends Database
{
    /**
     * Check empty fields.
     * @param array $data
     * @return bool
     */
    public function checkEmptyFields(array $data): bool
    {
        if (
            empty($data['first_name']) ||
            empty($data['last_name']) ||
            empty($data['username']) ||
            empty($data['email']) ||
            empty($data['password']) ||
            empty($data['confirmation_password'])
        ) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}