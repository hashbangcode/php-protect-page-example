<?php

// Grab user IP address.
$ip = $_SERVER['REMOTE_ADDR'];

if ($ip !== '172.18.0.5') {
    // The IP address is not correct, issue an access denied.
    header('HTTP/1.0 401 Unauthorized');
    $message = 'Invalid IP address.';
    include '../denied.php';
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>IP | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>IP Protected</h1>
            <p><a href="/ip/">IP</a></p>
            <p>This page can't be accessed if you don't have the correct IP address.</p>
        </div>
    </body>
</html>
