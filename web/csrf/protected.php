<?php

session_start();

$passedCsrf = $_GET['csrf'] ?? FALSE;
$csrf = $_SESSION['csrf'] ?? FALSE;

if ($passedCsrf === FALSE || $csrf === FALSE || $passedCsrf !== $csrf) {
  die('Access denied: Invalid CSRF.');
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
