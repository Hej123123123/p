


<?php
require_once 'db_conn.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check_query = "SELECT * FROM username WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color: red;'>Användarnamnet eller e-postadressen är redan registrerad.</p>";
    } else {
        $query = "INSERT INTO username (username, password, email) VALUES ('$username', '$password', '$email')";
        mysqli_query($conn, $query);
        header("Location: welcome.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="Sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrering</title>
</head>
<body>
    <h1>Registrera nytt konto</h1>
    <form action="reg.php" method="POST">
        <label for="username">Användarnamn:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Lösenord:</label><br>
        <input type="password" name="password" required><br>
        <label for="email">E-postadress:</label><br>
        <input type="email" name="email" required><br>
        <input type="submit" name="submit" value="Registrera">
    </form>
</body>
</html>



