<?php

namespace app\src\libs;

class Helpers
{
    /**
     * View data in php file.
     * @param string $filename
     * @param array $data
     * @return void
     */
    public function view(string $filename, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        require_once __DIR__ . '/../layouts/' . $filename . '.php';
    }

    /**
     * Redirect with session messages.
     * @param string $redirect
     * @param string $error_name
     * @param string $message
     * @return void
     */
    public function redirectWithSession(string $redirect, string $error_name, string $message): void
    {
        $_SESSION[$error_name] = $message;
        header('Location: ../' . $redirect);
        exit();
    }
}