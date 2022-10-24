<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use app\src\libs\Helpers;

$helpers = new Helpers();
?>

<?php $helpers->view('header', ['title' => 'Login Page']) ?>

<main class="w-100 m-auto container">
    <?php
    if (isset($_SESSION['success'])) {
        echo '
                <div style="background: rgba(10,211,45,0.4); padding: 1rem; font-weight: bold;">' . $_SESSION['success'] . '</div>
            ';

        unset($_SESSION['success']);
        session_destroy();
    }

    if (isset($_SESSION['error'])) {
        echo '
              <div style="
                  background: rgba(255,0,0,0.4);
                  padding: 1rem;
                  font-weight: bold;
              "
              >' . $_SESSION['error'] . '</div>
        ';

        unset($_SESSION['error']);
        session_destroy();
    }
    ?>

    <form method="post" action="includes/signin.inc.php">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <label for="username_email">Enter username or email</label>
            <input type="text" class="form-control" id="username_email" name="username_email"
                   placeholder="Username or email">
        </div>
        <div class="form-floating">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button class="w-100 btn btn-md btn-primary" type="submit" name="submit">Sign in</button>
    </form>
</main>

<?php $helpers->view('footer') ?>
