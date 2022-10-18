<?php

namespace app\src\libs;

class Helpers
{
    public function view(string $filename, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        require_once __DIR__ . '/../layouts/' . $filename . '.php';
    }
}