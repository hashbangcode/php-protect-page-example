<?php

$allowed_referrer = 'https://php-protect.ddev.site/';
if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], $allowed_referrer)) {
  die('Access denied: Invalid referrer.');
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
