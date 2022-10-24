<?php

namespace app\src\includes\classes;

class LoginValidation extends Database
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
            empty($this->data['username_email']) ||
            empty($this->data['password'])
        ) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}