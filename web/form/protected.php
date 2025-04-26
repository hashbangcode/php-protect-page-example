<?php

if (!isset($_POST['protected_form']) || $_POST['protected_form'] === true) {
    // The user hasn't submitted the form, deny access.
    header('HTTP/1.0 401 Unauthorized');
    $message = 'Invalid form submission.';
    include '../denied.php';
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form | Protected</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Form Protected</h1>
            <p><a href="/form/">Form</a></p>
            <p>This page can't be accessed directly.</p>
        </div>
    </body>
</html>
