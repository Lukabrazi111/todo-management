<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use app\src\libs\Helpers;

$helpers = new Helpers();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: ./index.php');
    exit();
}
?>

<?php $helpers->view('header', ['title' => 'Registration Page']) ?>
<main class="w-100 m-auto container">
    <?php
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
    <form method="post" action="./includes/signup.inc.php">
        <h1 class="h3 mb-3 fw-normal">Registration</h1>
        <div class="form-floating">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name">
        </div>
        <div class="form-floating">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name">
        </div>
        <div class="form-floating">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-floating">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="form-floating">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-floating">
            <label for="confirmation_password">Confirmation Password</label>
            <input type="password" class="form-control" id="confirmation_password" name="confirmation_password"
                   placeholder="Confirmation password">
        </div>
        <button class="w-100 btn btn-md btn-primary" name="submit" type="submit">Registration</button>
    </form>
</main>
<?php $helpers->view('footer') ?>
