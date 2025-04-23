<?php

// Grab user credentials.
$user = $_SERVER['PHP_AUTH_USER'] ?? '';
$pass = $_SERVER['PHP_AUTH_PW'] ?? '';

// Validate the credentials.
$validated = ($user === 'user') && ($pass === 'pass');

if (!$validated) {
    // Issue authentication header.
    header('WWW-Authenticate: Basic realm="Protected Page"');
    header('HTTP/1.0 401 Unauthorized');

    $message = 'Unauthorised.';
    include '../denied.php';
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Basic Auth | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Basic Auth Protected</h1>
            <p><a href="/basicauth/">Basic Auth</a></p>
            <p>This page can't be accessed directly.</p>
        </div>
    </body>
</html>
