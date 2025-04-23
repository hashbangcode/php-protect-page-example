<!DOCTYPE html>
<html>
    <head>
        <title>IP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>IP</h1>
            <p>Your IP address is <code><?php echo $_SERVER['REMOTE_ADDR']; ?></code>.</p>
            <p><a href="/ip/protected.php">IP Protected</a></p>
        </div>
    </body>
</html>
