<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=.0, maximum-scale=.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title><?php echo $title ?? 'Unnamed page' ?></title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="./index.php">Todo management</a>
        </div>
        <ul class="nav navbar-nav">
            <?php if (isset($_SESSION['logged_in'])) { ?>
                <li><a href="./logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./register.php">Register</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>