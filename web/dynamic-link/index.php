<?php

$link = base64_encode($_SERVER['REMOTE_ADDR'] . '/' . time());

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dynamic Link</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Dynamic Link</h1>
            <p><a href="/dynamic-link/protected.php?link=<?php echo $link ?>">Dynamic Link Protected</a></p>
        </div>
    </body>
</html>
