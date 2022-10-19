<?php
session_start();

use app\src\includes\classes\UserController;
use app\src\includes\classes\Validation;
use app\src\libs\Helpers;

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
    $helpers = new Helpers();

    /**
     * Check if fields is empty.
     */
    if ($validation->checkEmptyFields() === false) {
        $helpers->redirectWithSession('register.php', 'error', 'Please fill all fields!');
    }

    /**
     * Check username length.
     */
    if ($validation->checkLength($data['username']) === false) {
        $helpers->redirectWithSession('register.php', 'error', 'Username must be greater than 5!');
    }

    /**
     * Check email validation.
     */
    if ($validation->checkEmail() === false) {
        $helpers->redirectWithSession('register.php', 'error', 'Email is not valid!');
    }

    /**
     * Password with special chars.
     */
    if (!preg_match('@[^\w]@', $data['password'])) {
        $helpers->redirectWithSession('register.php', 'error', 'Password should include special characters!');
    }

    /**
     * Password match.
     */
    if ($validation->checkPasswordMatch() === false) {
        $helpers->redirectWithSession('register.php', 'error', 'Password mismatch!');
    }

    /**
     * Check password length.
     */
    if ($validation->checkLength($data['password']) === false || $validation->checkLength($data['confirmation_password']) === false) {
        $helpers->redirectWithSession('register.php', 'error', 'Password must be greater than 5!');
    }

    $sign_up->storeUser($data);
    $helpers->redirectWithSession('login.php', 'success', 'Registered successfully!');
}