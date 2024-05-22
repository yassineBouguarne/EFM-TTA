<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authontification</title>
    <link rel="stylesheet" href="auth.css">
</head>

<body>
    <div class="container">
        <h1>Authontification</h1>
        <div class="form-container">
            <div>
                <p><?php echo isset($_SESSION["empty_input"]) ? $_SESSION["empty_input"] : "";
                unset($_SESSION["empty_input"]);
                ?>
                </p>
            </div>
            <form action="authentifier.php" method="post">
                <label for="login">Login</label>
                <input type="text" id="login" name="login">
                <label for="mtp">Mot de Passe</label>
                <input type="text" name="password" id="mtp">
                <button type="submit" class="auth">S'authontification</button>
            </form>
        </div>
    </div>
</body>

</html>