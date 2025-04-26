<?php

// Include the JWT functions.
require_once "jwt.php";

// Generate our payload.
$payload = [
  "ip" => $_SERVER["REMOTE_ADDR"],
  "time" => time(),
];

// Encode our payload.
$jwt = jwt_encode($payload, JWT_KEY);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>JWT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>JWT</h1>
            <p><a href="/jwt/protected.php?jwt=<?php echo $jwt; ?>">JWT Protected</a></p>
        </div>
    </body>
</html>
