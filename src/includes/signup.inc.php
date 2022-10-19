<?php

use app\src\includes\classes\UserController;
use app\src\includes\classes\Validation;

require_once __DIR__ . '/../../vendor/autoload.php';

if (isset($_POST['submit'])) {
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'confirmation_password' => $_POST['confirmation_password'],
    ];

    $validation = new Validation($data);
    $sign_up = new UserController();

    /**
     * Check if fields is empty.
     * @todo: create session for errors.
     */
    if ($validation->checkEmptyFields() === false) {
        die('Please fill all fields!');
    }

    /**
     * Password with special chars.
     */
    if (!preg_match('@[^\w]@', $data['password'])) {
        die('Password should include special characters!');
    }

    /**
     * Password match.
     */
    if ($validation->checkPasswordMatch() === false) {
        die('Password mismatch!');
    }

    /**
     * Check username length.
     */
    if ($validation->checkLength($data['username']) === false) {
        die('Username must be greater than 5!');
    }

    /**
     * Check email validation.
     */
    if ($validation->checkEmail() === false) {
        die('Email is not valid!');
    }

    /**
     * Check password length.
     */
    if ($validation->checkLength($data['password']) === false || $validation->checkLength($data['confirmation_password']) === false) {
        die('Password must be greater than 5!');
    }

    $sign_up->storeUser($data);
    header('Location: ../login.php');
    exit();
}