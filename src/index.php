<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\src\libs\Helpers;

$helpers = new Helpers();

?>

<?php $helpers->view('header', ['title' => 'Main page']) ?>

<!-- Content -->
<div class="bg-light p-5 rounded container">
    <h1>Please sign in to see todos</h1>
    <a class="btn btn-lg btn-primary" href="./login.php" role="button">Sign in »</a>
</div>

<?php $helpers->view('footer') ?>

