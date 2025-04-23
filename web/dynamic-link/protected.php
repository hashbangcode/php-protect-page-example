<?php

$authorised = false;

if (isset($_GET['link'])) {
    $link = base64_decode($_GET['link']);
    list($ip, $time) = explode('/', $link);
    if ($ip === $_SERVER['REMOTE_ADDR'] || $time >= (time() - 60)) {
      $authorised = true;
    }
}

if ($authorised === false) {
  header('HTTP/1.0 401 Unauthorized');
  $message = 'Invalid link.';
  include '../denied.php';
  die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dynamic Link | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Cookie Dynamic Link</h1>
            <p><a href="/dynamic-link/">Dynamic Link</a></p>
            <p>This page can't be accessed directly.</p>
        </div>
    </body>
</html>
