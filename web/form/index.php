<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <?php include '../../header.php'; ?>

        <div class="container">
            <h1>Form</h1>

            <form method="post" action="protected.php">
                <input type="hidden" name="protected_form" value="true" />
                <input type="submit" value="View Protected Page" />
            </form>

        </div>
    </body>
</html>
