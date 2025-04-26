<?php

// Location of page that the user must have visited first.
$allowed_referrer = '/referrer/';

if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], $allowed_referrer)) {
    // The user didn't come from the correct place, so deny access.
    header('HTTP/1.0 401 Unauthorized');
    $message = 'Invalid referrer.';
    include '../denied.php';
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Referrer | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Referrer Protected</h1>
            <p><a href="/referrer/">Referrer</a></p>
            <p>This page can't be accessed directly.</p>
        </div>
    </body>
</html>
