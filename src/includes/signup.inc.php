<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use app\src\includes\classes\Signup;

if (isset($_POST['submit'])) {
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'confirmation_password' => $_POST['confirmation_password'],
    ];

    $sign_up = new Signup();

    /**
     * @todo: create session for errors.
     */
    if ($sign_up->checkEmptyFields($data) !== false) {
        header('Location: ../login.php');
        exit();
    } else {
        echo "Please fill all fields!";
    }


}