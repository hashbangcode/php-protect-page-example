<?php

// Start the session so that we can grab the CSRF token from it.
session_start();

// Get the passed CSRF token and the one stored in the session.
$passedCsrf = $_GET['csrf'] ?? FALSE;
$csrf = $_SESSION['csrf'] ?? FALSE;

if ($passedCsrf === FALSE || $csrf === FALSE || $passedCsrf !== $csrf) {
    // The tokens do not match, deny the user access.
    header('HTTP/1.0 401 Unauthorized');
    $message = 'Invalid CSRF.';
    include '../denied.php';
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>CSRF | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>CSRF Protected</h1>
            <p><a href="/csrf/">CSRF</a></p>
            <p>This page can't be accessed directly.</p>
        </div>
    </body>
</html>
