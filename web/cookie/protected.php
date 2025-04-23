<?php

if (!isset($_COOKIE['cookie_protected']) || $_COOKIE['cookie_protected'] !== 'allow') {
  die('Access denied: Invalid cookie.');
}

setcookie("cookie_protected", '',  time()-3600, '/cookie/');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cookie | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Cookie Protected</h1>
            <p><a href="/cookie/">Cookie</a></p>
            <p>This page can't be accessed directly.</p>
        </div>
    </body>
</html>
