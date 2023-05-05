<!DOCTYPE html>
<html lang="Sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Logga in</h1>
    <form action="process.php" method="POST">
        <label for="username">Användarnamn:</label><br>
        <input type="text" name="username" required><br>

        <label for="password">Lösenord:</label><br>
        <input type="password" name="password" required><br>

        <input type="submit" name="submit" value="Logga in">
    </form>

<h4>Har du ingen konto? Registrera här!</h4>
    <form action="reg.php">
        <input type="submit" value="Registrera"  target="_blank">
    </form>

    <?php
        session_start();

        if(isset($_GET['error'])){
            echo "<p style='color: red;'>Fel användarnamn eller lösenord.</p>";
        }

        if(isset($_GET['ejlogin'])){
            echo "<p style='color: red;'>Du måste logga in igen/först.</p>";
        }

        if(isset($_GET['logout'])){
            echo "<p style='color: red;'>Du är utloggad.</p>";
            session_destroy();
        }
    ?>
</body>
</html>
