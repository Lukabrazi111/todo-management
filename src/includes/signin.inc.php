<?php
session_start();

use app\src\includes\classes\LoginValidation;
use app\src\includes\classes\UserController;
use app\src\libs\Helpers;

require_once __DIR__ . '/../../vendor/autoload.php';

if (isset($_POST['submit'])) {
    $data = [
        'username_email' => $_POST['username_email'],
        'password' => $_POST['password'],
    ];

    $helpers = new Helpers();
    $user = new UserController();
    $validation = new LoginValidation($data);

    if ($validation->checkEmptyFields() === false) {
        $helpers->redirectWithSession('login.php', 'error', 'Please fill all fields!');
        exit();
    }

    $user->auth($data);
}