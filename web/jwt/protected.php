<?php

require_once "jwt.php";

$jwtToken = $_GET["jwt"] ?? '';

try {
    $jwtToken = jwt_decode($jwtToken, JWT_KEY);
} catch (Exception $e) {
    header('HTTP/1.0 401 Unauthorized');
    $message = 'Invalid JWT.';
    include '../denied.php';
    die();
}

if (!isset($jwtToken['ip']) || !isset($jwtToken['time']) && ($jwtToken['ip'] !== $_SERVER["REMOTE_ADDR"] && $jwtToken['time'] <= (time() - 60))) {
    header('HTTP/1.0 401 Unauthorized');
    $message = 'Invalid JWT.';
    include '../denied.php';
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>JWT | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>JWT Protected</h1>
            <p><a href="/jwt/">JWT</a></p>
            <p>This page can't be accessed directly.</p>
        </div>
    </body>
</html>
