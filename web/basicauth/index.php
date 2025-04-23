<!DOCTYPE html>
<html>
    <head>
        <title>Basic Auth</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Basic Auth</h1>
            <p><a href="//user:pass@<?php echo $_SERVER['HTTP_HOST']; ?>/basicauth/protected.php">Basic Auth Protected</a></p>
        </div>
    </body>
</html>
