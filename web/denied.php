<!DOCTYPE html>
<html>
    <head>
        <title>Denied</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Denied!</h1>
            <div class="alert alert-danger" role="alert">
            <p><strong>Access denied</strong></p>
            <?php if (isset($message)) { ?>
            <p><?php echo $message; ?></p>
            <?php } ?>
            </div>
        </div>
    </body>
</html>
