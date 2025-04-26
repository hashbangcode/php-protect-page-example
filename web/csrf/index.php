<?php

// Start the session so we can store the CSRF token there.
session_start();

// Generate the CSRF token.
$csrf = hash('sha256', bin2hex(random_bytes(15)));

// Store the CSRF token in the session.
$_SESSION['csrf'] = $csrf;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>CSRF</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>CSRF</h1>
            <p><a href="/csrf/protected.php?csrf=<?php echo $_SESSION['csrf']; ?>">CSRF Protected</a></p>
        </div>
    </body>
</html>
